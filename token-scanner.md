# Token Scanner Guide

The CFG Ninja Token Scanner helps you analyze any token contract for common security risks across 30+ blockchains.

## 🚀 Quick Start

1. Visit **https://cfg.ninja/token-scanner**
2. Enter token contract address
3. Select blockchain network
4. Click **"Scan Token"** (or **"Scan Token with AI"** for enhanced analysis)
5. Review the security report

## 🔍 What is the Token Scanner?

The Token Scanner is a **free tool** that analyzes smart contracts to detect:
- 🚨 Honeypot scams
- 💰 Hidden taxes and fees
- 🔒 Ownership risks
- ⚠️ Trading restrictions
- 🔧 Dangerous functions
- 📊 Market data and holder information

**Supported Networks** (30+ blockchains):
- Ethereum, BSC, Polygon, Arbitrum, Optimism
- Avalanche, Fantom, Cronos, Base, Blast
- Pulsechain, Solana, and many more!

## 📝 How to Use

### Step 1: Get the Contract Address

Find your token's contract address from:
- **CoinGecko**: Token page → "Contract" section
- **CoinMarketCap**: Token page → "Contracts" tab
- **Blockchain Explorer**: Search for token, copy address
- **Trading Platform**: Token info page

**Example addresses**:
- USDT (Ethereum): `0xdac17f958d2ee523a2206206994597c13d831ec7`
- WBNB (BSC): `0xbb4cdb9cbd36b01bd1cbaebf2de08d9173bc095c`

### Step 2: Select Blockchain

Choose the network where your token exists:

**Popular Networks**:
| Network | Chain ID | Best For |
|---------|----------|----------|
| Ethereum | eth | Established tokens, DeFi |
| BSC (Binance) | bsc | Low fees, new projects |
| Polygon | polygon | Fast transactions |
| Arbitrum | arbitrum | Ethereum L2, lower fees |
| Base | base | Coinbase ecosystem |
| Solana | solana | High speed, low cost |

### Step 3: Choose Scan Type

#### Standard Scan (Free)
- Basic security checks
- Honeypot detection
- Tax analysis
- Ownership information
- Trading restrictions
- Results in 2-5 seconds

#### AI-Powered Scan (Free, Optional) 🤖
- Everything in Standard Scan
- **PLUS**: Human-readable risk analysis
- Risk score with explanation
- Critical issues highlighted
- Positive security signals
- AI verdict and recommendation
- Educational insights
- Results in 5-10 seconds

**When to use AI scan**:
- ✅ Analyzing new/unknown tokens
- ✅ Need simplified explanation
- ✅ Want risk score (0-10)
- ✅ Educational learning
- ❌ Quick checks (standard is faster)
- ❌ Well-known tokens (not necessary)

### Step 4: Interpret Results

## 📊 Understanding Scan Results

### Security Flags Explained

#### 🚨 CRITICAL FLAGS (Avoid!)

**🍯 Honeypot Detected**
- **Meaning**: You can buy but cannot sell
- **Scam Type**: Classic honeypot trap
- **Action**: ❌ DO NOT BUY
- **Why**: Tokens can't be sold, guaranteed loss

**🔒 Hidden Owner**
- **Meaning**: True owner is concealed
- **Risk**: Owner can rug pull without warning
- **Action**: ⚠️ Extreme caution
- **Why**: Anonymous control is red flag

**🔓 Ownership Not Renounced**
- **Meaning**: Owner retains control
- **Risk**: Can modify contract, mint tokens
- **Action**: ⚠️ Check owner reputation
- **Why**: Centralized control risk

#### ⚠️ HIGH RISK FLAGS

**💸 High Buy/Sell Tax**
- **Meaning**: Taxes above 10%
- **Risk**: Significant loss on trades
- **Action**: Calculate if profitable
- **Example**: 15% sell tax = lose 15% every sale

**⏸️ Trading Pausable**
- **Meaning**: Owner can stop all trading
- **Risk**: Liquidity can be frozen
- **Action**: ⚠️ Check trust level
- **Why**: Emergency stop can be abused

**💎 Transfer Pausable**
- **Meaning**: Owner can pause transfers
- **Risk**: Tokens can be locked
- **Action**: ⚠️ Verify team reputation
- **Why**: Similar to trading pause risk

**🪙 Mintable**
- **Meaning**: Owner can create new tokens
- **Risk**: Supply inflation, price dump
- **Action**: Check if mint capped
- **Why**: Unlimited minting dilutes value

#### 🟡 MEDIUM RISK FLAGS

**🔄 Proxy Contract**
- **Meaning**: Contract can be upgraded
- **Risk**: Logic can change after audit
- **Action**: Check proxy admin
- **Why**: Upgradeable = mutable security

**🛡️ Not Open Source**
- **Meaning**: Code not verified
- **Risk**: Can't verify safety
- **Action**: Wait for verification
- **Why**: Transparency is crucial

**⚡ Max Transaction Limit**
- **Meaning**: Limits per transaction
- **Risk**: Restricts large trades
- **Action**: Check limit amount
- **Why**: May affect liquidity exits

**💰 Max Wallet Limit**
- **Meaning**: Limits tokens per wallet
- **Risk**: Can't accumulate large positions
- **Action**: Check if reasonable
- **Why**: Anti-whale or restriction?

#### 🟢 POSITIVE SIGNALS

**✅ Verified Contract**
- Source code published
- Can audit functionality
- Transparency indicator

**🔒 Ownership Renounced**
- No single controller
- Immutable contract
- Community owned

**🔐 Liquidity Locked**
- Can't rug pull liquidity
- Safer investment
- Check lock duration

**📝 Audit Performed**
- Professional security review
- Vulnerabilities identified
- Higher trust level

**🏆 On Trust List**
- Well-known token
- Established reputation
- Lower risk profile

### Market Data Analysis

**Holder Information**:
- Total holders: More = better distribution
- Top 10 holders: Check concentration
- Creator holdings: Watch for dumps

**Liquidity Data**:
- Total liquidity: Higher = less slippage
- Liquidity locked: Check lock date
- LP token burns: Good sign

**Trading Metrics**:
- 24h volume: Activity indicator
- Price change: Volatility measure
- Market cap: Project size

## 🤖 AI Analysis Features (Optional)

### Risk Score (0-10)

```
0-2  | 🟢 Low Risk      | Generally safe, few concerns
3-4  | 🟢 Low Risk      | Minor issues, manageable
5-6  | 🟡 Medium Risk   | Proceed with caution
7-8  | 🟠 High Risk     | Significant concerns
9-10 | 🔴 Critical Risk | Avoid, major red flags
```

### Critical Issues Section

Lists the most important problems:
- **Severity**: Critical / High / Medium
- **Description**: What's wrong
- **Impact**: How it affects you
- **User Impact**: Your risk level

### Positive Signals

Good security practices found:
- ✅ Verified source code
- ✅ Renounced ownership
- ✅ Liquidity locked
- ✅ Reasonable tokenomics
- ✅ Active community

### AI Verdict

**Recommendation Types**:
- ❌ **Avoid**: Don't buy, too risky
- ⚠️ **Extreme Caution**: High risk, only if experienced
- 🟡 **Moderate Caution**: Some risks, DYOR
- ✅ **Relatively Safe**: Few concerns, reasonable risk

**Includes**:
- Summary of overall risk
- Key reasoning points
- What to watch for

### Educational Note

Learn why certain flags matter:
- Security concepts explained
- Real-world examples
- Risk management tips

## 📋 Sample Scan Interpretations

### Example 1: Low Risk Token (Score: 2/10)

```
✅ Verified Contract
✅ Ownership Renounced
✅ No Honeypot
✅ No Unusual Taxes
✅ On Trust List (WETH)
✅ Liquidity Locked

Verdict: ✅ Relatively Safe
"This appears to be a legitimate, well-established 
token with strong security practices."
```

**Action**: Safe to trade with normal precautions

### Example 2: Medium Risk Token (Score: 6/10)

```
⚠️ Ownership Not Renounced
⚠️ Mintable
✅ Verified Contract
✅ No Honeypot
🟡 5% Buy Tax, 8% Sell Tax
✅ Liquidity Locked

Verdict: 🟡 Moderate Caution
"Centralized control with mint function presents 
risks. Tax rates are above average."
```

**Action**: Research team, check tokenomics, small position only

### Example 3: High Risk Token (Score: 9/10)

```
🚨 Honeypot Detected
🔒 Hidden Owner
⚠️ Trading Pausable
⚠️ Not Verified
🟡 20% Sell Tax
❌ Liquidity Not Locked

Verdict: ❌ AVOID
"Multiple critical red flags indicate this is 
likely a scam. Do not invest."
```

**Action**: ❌ DO NOT BUY

## 🛡️ Safety Tips

### Before Scanning
1. ✅ Double-check contract address (scammers create fakes)
2. ✅ Verify on blockchain explorer
3. ✅ Check official project website/social media
4. ✅ Select correct blockchain network

### After Scanning
1. 📊 Review ALL flags, not just one
2. 🔍 Check holder distribution
3. 💰 Verify liquidity amount
4. 📅 Look at creation date
5. 🔗 Compare with audit (if available)
6. 💡 Trust your instincts

### Red Flag Combinations

**Extreme Danger** 🚨:
- Honeypot + Hidden Owner
- Honeypot + Not Verified
- High Tax + Trading Pausable + Hidden Owner

**High Risk** ⚠️:
- Mintable + Ownership Not Renounced
- High Tax + Not Verified
- Proxy + Hidden Owner

**Medium Risk** 🟡:
- Not Verified + New Token
- Proxy + Ownership Not Renounced
- High Tax + Small Liquidity

## ⚡ Advanced Features

### Chain Comparison

Scan same token on different chains:
1. Check if token is multichain
2. Scan on each network
3. Compare security flags
4. Some forks may be scams!

### Historical Scanning

- Rescan periodically
- Check for contract changes
- Monitor tax adjustments
- Track liquidity changes

### API Integration (Developers)

Access scanner programmatically:
```bash
GET /api/scanner/scan-token
{
  "tokenAddress": "0x...",
  "chain": "bsc",
  "includeAI": true
}
```

## ❓ Common Questions

**Q: Is the scanner 100% accurate?**
A: No tool is perfect. Use scanner as ONE data point, not the only one. Always DYOR.

**Q: Why do results differ from other scanners?**
A: Different scanners use different methods and thresholds. Compare multiple sources.

**Q: Can scammers bypass the scanner?**
A: Sophisticated scammers may hide some risks. Scanner catches common patterns but not everything.

**Q: How often should I rescan?**
A: Before major trades, after project updates, or if token behavior changes.

**Q: Is AI analysis always available?**
A: AI features may be limited by daily quota. Standard scan always works.

**Q: Do you store my scans?**
A: No. Scans are processed in real-time and not stored.

## 🚨 Limitations & Disclaimers

**Scanner CANNOT detect**:
- Social engineering scams
- Off-chain manipulation
- Future rug pulls from verified projects
- Complex multi-step exploits
- Team reputation issues

**Scanner IS NOT**:
- ❌ Financial advice
- ❌ Investment recommendation
- ❌ Guarantee of safety
- ❌ Complete security audit
- ❌ Replacement for due diligence

**Remember**:
- Always DYOR (Do Your Own Research)
- Never invest more than you can afford to lose
- High returns often mean high risk
- If it seems too good to be true, it probably is

## 💡 Pro Tips

### For Beginners
1. Start with well-known tokens (USDT, WETH, etc.)
2. Use AI scan for learning
3. Read educational notes
4. Practice interpreting results
5. Never rush into unknown tokens

### For Experienced Users
1. Cross-reference with multiple scanners
2. Check blockchain explorer directly
3. Review contract code if verified
4. Analyze holder patterns
5. Monitor team actions

### For Developers
1. Scan your own tokens before launch
2. Fix issues before audit
3. Renounce ownership when ready
4. Lock liquidity properly
5. Verify contract source code

## 🔗 Related Resources

- [Request Full Audit](./request-audit.md) - Professional security review
- [View Audited Projects](./viewing-audits.md) - See completed audits
- [Security Best Practices](./faq.md#security-tips) - Learn more

## 🆘 Need Help?

- **Scanner not working?** Email support@cfg.ninja
- **Unclear results?** Ask in Telegram: https://t.me/cfgninja
- **Found a bug?** Report on GitHub

---

*Last Updated: January 18, 2026*

*The CFG Ninja Token Scanner is a free community tool. Use at your own risk. Not financial advice.*
