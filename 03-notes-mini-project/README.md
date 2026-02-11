# Simple Note-Taking App Database Setup

## Overview

In this project, we begin by designing the database structure for a simple note-taking application. The main idea is that:

- A **User** can create multiple **Notes**

- Each **Note** belongs to a specific **User**

To achieve this, we create two tables and define relationships and constraints to maintain database consistency.

---

## Database Tables

### 1\. Users Table

The `users` table stores information about each user in the system.

#### Columns:

- `id` --- Primary key (integer)

- `name` --- User's name (string, required)

- `email` --- User's email address (string, required, unique)

#### Important Notes:

- The `email` field must be unique.

- A unique index ensures that no two users can share the same email address.

- This prevents duplicate entries and maintains data integrity.

---

### 2\. Notes Table

The `notes` table stores notes created by users.

#### Columns:

- `id` --- Primary key (integer)

- `body` --- Content of the note (text, required)

- `user_id` --- Foreign key referencing the user who created the note (integer, required)

#### Relationship:

- Each note belongs to one user.

- The `user_id` column references the `id` column in the `users` table.

---

## Database Constraints

### Unique Constraint

A unique index is added to the `email` column in the `users` table to ensure:

- Each email address is used by only one user.

---

### Foreign Key Constraint

The `notes.user_id` column is defined as a foreign key:

- References: `users.id`

- Ensures that every note is associated with an existing user.

- Prevents invalid references (e.g., notes linked to non-existing users).

---

### Cascade Delete

When a user is deleted:

- All notes associated with that user are automatically deleted.

- This prevents orphaned records (notes without a valid user).

---

## Relationship Summary

- One User → Many Notes

- Each Note → Belongs to One User
