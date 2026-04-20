---
name: generate-review-description
description: A skill made for generating PR according to the established PR format 
metadata:
  author: Dawn Dagcuta
  version: "1.0.0"
---

## Overview

This is a skill meant to generate a Peer Review description based on the established PR format of an organization. 

## Format 
The following is the PR of the organization: 

```
## Description
A comprehensive and concise summary of the purpose of the changes made.
 
## Changes made 
A bullet-form of the changes made formatted as: 
- `File namespace` - description of changes made inside the file and why

### Misc (if any)
Changes to files made not directly related to the feature.

## Deployment notes 
Notes that should be known when deploying, including new environment variables, packages, tables, migration files, and etc.
```

## How to use 
Read the staged files. 

If there are no staged files, notify the user by saying, "There are no staged files to use as reference to generating a PR."

If there are staged files, use the format specified and create a PR description. Conditionally include Misc. and Deployment notes by only including them if there are relevant information or description meant for them. 