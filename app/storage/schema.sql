CREATE TABLE IF NOT EXISTS "downloads" (
  "id" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "date" integer NOT NULL,
  "ip" text NOT NULL,
  "ua" text NOT NULL
);
