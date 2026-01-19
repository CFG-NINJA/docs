# Vote API Implementation - Phase 12

## Overview
Implemented backend voting API to complete the WalletConnect integration from Phase 10. Users can now vote on project security using their connected wallets.

## Backend Implementation

### Vote Model (`/backend/src/models/Vote.js`)
- **Schema Fields:**
  - `projectId` - Reference to Project
  - `walletAddress` - Voter's wallet (lowercase, indexed)
  - `voteType` - 'secure' or 'insecure'
  - `votedAt` - Timestamp (default: now)
  - `ipAddress` - Optional IP tracking
  - `userAgent` - Optional browser tracking
  
- **Indexes:**
  - Single field indexes on `projectId` and `walletAddress` for performance
  - Compound index on `projectId` + `walletAddress` + `votedAt` for duplicate prevention
  - TTL index on `votedAt` (90 days) for automatic cleanup

- **Static Methods:**
  - `hasVotedToday(projectId, walletAddress)` - Checks if wallet voted today
  - `getProjectVotes(projectId)` - Returns vote statistics

### Vote Routes (`/backend/routes/votes.js`)

#### POST /api/votes
Submit a vote for a project.

**Request Body:**
```json
{
  "projectId": "string (MongoDB ObjectId)",
  "walletAddress": "string (ETH address)",
  "voteType": "secure" | "insecure"
}
```

**Validation:**
- All fields required
- voteType must be 'secure' or 'insecure'
- Project must exist
- Wallet cannot have voted today (24-hour limit)

**Response (Success - 200):**
```json
{
  "success": true,
  "message": "Vote submitted successfully",
  "data": {
    "secure_votes": 42,
    "insecure_votes": 15,
    "total_votes": 57
  }
}
```

**Response (Already Voted - 409):**
```json
{
  "success": false,
  "message": "You have already voted for this project today"
}
```

**Behavior:**
1. Validates request
2. Checks if project exists
3. Checks if wallet has already voted today
4. Creates vote document
5. Atomically updates Project vote counts (`$inc`)
6. Returns updated counts

#### GET /api/votes/check
Check if a wallet has voted for a project today.

**Query Parameters:**
- `projectId` - Project MongoDB ObjectId
- `walletAddress` - ETH wallet address

**Response (200):**
```json
{
  "success": true,
  "hasVoted": true
}
```

#### GET /api/votes/stats/:projectId
Get vote statistics for a project.

**Response (200):**
```json
{
  "success": true,
  "data": {
    "secure_votes": 42,
    "insecure_votes": 15,
    "total_votes": 57
  }
}
```

## Frontend Integration

The frontend (implemented in Phase 10) already calls these endpoints:

**On Page Load:**
```typescript
// Check if user already voted today
const hasVoted = await fetch(`${apiBase}/votes/check?projectId=${project._id}&walletAddress=${wallet}`);
```

**On Vote Button Click:**
```typescript
// Submit vote
const response = await fetch(`${apiBase}/votes`, {
  method: 'POST',
  body: JSON.stringify({ projectId, walletAddress, voteType })
});
```

## Security Features

1. **Rate Limiting:** Vote endpoints use general API rate limiter (100 req/15min per IP)
2. **Daily Limit:** One vote per wallet per project per 24 hours
3. **Input Sanitization:** express-mongo-sanitize prevents NoSQL injection
4. **Wallet Normalization:** Addresses lowercased for consistent comparison
5. **Atomic Updates:** Project vote counts updated with `$inc` to prevent race conditions
6. **IP Tracking:** Optional IP address logged for fraud detection
7. **TTL Cleanup:** Votes automatically deleted after 90 days

## Database Updates

### Project Model
Already has vote count fields (no changes needed):
```javascript
total_votes: { type: Number, default: 0 },
secure_votes: { type: Number, default: 0 },
insecure_votes: { type: Number, default: 0 },
```

## Server Registration

Routes registered in `/backend/src/server.js`:
```javascript
try {
  const voteRoutes = require('../routes/votes');
  app.use('/api/votes', voteRoutes);
  console.log('✅ Vote routes loaded');
} catch (error) {
  console.error('❌ Failed to load vote routes:', error.message);
}
```

## Testing

### Manual Test Script
```bash
# Check if already voted
curl http://localhost:5000/api/votes/check?projectId=PROJECTID&walletAddress=0xADDRESS

# Submit secure vote
curl -X POST http://localhost:5000/api/votes \
  -H "Content-Type: application/json" \
  -d '{"projectId":"PROJECTID","walletAddress":"0xADDRESS","voteType":"secure"}'

# Get vote stats
curl http://localhost:5000/api/votes/stats/PROJECTID
```

### Frontend Test
1. Navigate to project page
2. Connect wallet using ConnectWallet button
3. Click "Vote Secure" or "Vote Insecure"
4. Verify toast notification appears
5. Verify vote counts update in UI
6. Verify button disabled after voting
7. Refresh page - verify "Already voted" state persists
8. Try voting again - should show error toast

## Error Handling

All endpoints return consistent error format:
```json
{
  "success": false,
  "message": "Error description",
  "error": "Technical error details (dev only)"
}
```

**Common Errors:**
- 400: Missing required fields
- 404: Project not found
- 409: Already voted today
- 500: Server error

## Performance Considerations

- **Indexes:** All query fields indexed for fast lookups
- **Atomic Operations:** `$inc` prevents race conditions on vote counts
- **TTL:** Automatic cleanup prevents unbounded growth
- **Compound Index:** projectId + walletAddress + votedAt enables efficient duplicate detection

## Future Enhancements

Potential improvements for future versions:

1. **Vote History:** Track vote changes over time
2. **Vote Weight:** Weight votes by wallet age or token holdings
3. **Analytics:** Vote trend graphs and insights
4. **Export:** CSV export of voting data for analysis
5. **Bot Protection:** reCAPTCHA integration
6. **Multi-Chain:** Support votes from different blockchains
7. **Vote Reason:** Optional comment field for voters
8. **Reputation:** Build voter reputation scores

## Related Documentation

- Phase 10: WALLETCONNECT_AUDIT_CONFIDENCE_IMPLEMENTATION.md
- Frontend API calls: `/frontend/src/app/[slug]/page.tsx` lines 83-120
- Feature parity: FEATURE_PARITY_COMPARISON.md

## Version
- **Implemented:** v3.13.0
- **Date:** 2025
- **Status:** ✅ Complete
