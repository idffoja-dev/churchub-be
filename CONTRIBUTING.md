# Contributing Guide

## Branching Strategy

We follow a structured branching model to keep the codebase stable.

### Branches

| Branch | Purpose |
|---|---|
| `main` | Live production environment. Never commit directly here. |
| `staging` | Staging environment. Fully tested code ready for production. |
| `develop` | Active development. All feature branches merge here. |
| `feature/*` | New features. Branch off from `develop`. |
| `bugfix/*` | Bug fixes. Branch off from `develop`. |
| `release/*` | Release preparation. Branch off from `develop`, merge into `staging`. |

### Flow
```
feature/* or bugfix/* → develop → staging → main
```

### Branch Naming
- `feature/member-management`
- `feature/auth-login`
- `bugfix/fix-token-expiry`
- `release/v1.0.0`

### Rules
- Never commit directly to `main`, `develop`, or `production`
- Always open a Pull Request (PR) for code review
- PR must pass CI checks before merging
- Delete feature branches after merging