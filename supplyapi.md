(node:14) [MONGOOSE] Warning: Duplicate schema index on {"invoiceNumber":1} found. This is often due to declaring an index using both "index: true" and "schema.index()". Please remove the duplicate index definition.
(Use `node --trace-warnings ...` to show where the warning was created)
# Token Distribution Scanner API (Moralis)

This document outlines the new API endpoints and implementation plan for fetching token holder data, total burned, total supply, and circulating supply using Moralis.

## Overview
The API will provide endpoints to fetch:
- **Top token holders**
- **Total supply**
- **Total burned tokens**
- **Circulating supply**

All data will be sourced from [Moralis Token API](https://moralis.com/api/token/).

## Endpoints

### 1. Get Token Holders
- **GET** `/api/token/holders?address={tokenAddress}&chain={chain}`
- **Description:** Returns a list of top holders for a given token.

### 2. Get Total Supply
- **GET** `/api/token/total-supply?address={tokenAddress}&chain={chain}`
- **Description:** Returns the total supply of the token.

### 3. Get Total Burned
- **GET** `/api/token/total-burned?address={tokenAddress}&chain={chain}`
- **Description:** Returns the total number of burned tokens (if available).

### 4. Get Circulating Supply
- **GET** `/api/token/circulating-supply?address={tokenAddress}&chain={chain}`
- **Description:** Returns the circulating supply (total supply minus burned and locked tokens).

## Moralis API Reference
- [Moralis Token API Docs](https://docs.moralis.com/web3-data-api/evm/reference/token-api)
- [How to Get the Full Supply of a Token](https://moralis.com/how-to-get-the-full-supply-of-a-token/)

## Implementation Notes
- Requires Moralis API key.
- Use `/erc20/metadata` for total supply.
- Use `/erc20/{address}/holders` for holders.
- Burned tokens may be tracked by querying known burn addresses.
- Circulating supply = total supply - burned - locked (locked may require custom logic).

---

## Admin Customer Page Enhancements

- The **Admin Customer** page’s 🔍 **Scan Distribution** feature will be updated to:
  - Identify and display the top 5 token holders using Moralis.
  - Update the holders chart with each holder’s address and token amount based on the scan results.
  - All data will be sourced from the Moralis Token API for accuracy and consistency.

**Purpose:**
- Ensure the top holders and their balances are always up-to-date and visible to admins after each scan.
- Provide a clear, real-time chart of token distribution for every project.

---

## Project-Specific API and UI Integration

For every project (`$slug`):

- We will create two dedicated API endpoints:
  - `/api/token/{slug}/supply` — returns the total supply as a numeric value.
  - `/api/token/{slug}/circulating` — returns the circulating supply as a numeric value.

- The frontend Token Distribution section for each `$slug` will display a card showing:
  - **Total Supply**
  - **Total Burned**
  - **Total Circulating Supply**

### Implementation Steps

1. **Backend**
   - Implement `/api/token/{slug}/supply` and `/api/token/{slug}/circulating` endpoints.
   - Each endpoint will look up the token address and chain for the project, query Moralis, and return the value as a number.
   - Use the Moralis Token API for all data retrieval.

2. **Frontend**
   - In the Token Distribution section for each project page (`$slug`), add a card UI component.
   - The card will fetch and display total supply, total burned, and total circulating supply using the new API endpoints.
   - Values will be formatted for readability.

3. **Environment Variables**
   - The Moralis API key (`MORALIS_API_KEY`) is securely stored as an environment variable in both Railway and Vercel deployments.
   - The backend reads this variable to authenticate Moralis API requests.

#### Example Card UI

```
+-------------------------------+
|   Token Distribution Summary  |
+-------------------------------+
| Total Supply:        1,000,000|
| Total Burned:           10,000|
| Circulating Supply:   990,000 |
+-------------------------------+
```

---

Let me know if you want any changes or if I should proceed to implementation.
