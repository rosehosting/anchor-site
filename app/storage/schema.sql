CREATE TABLE "downloads" (
  "id" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "date" integer NOT NULL,
  "ip" text NOT NULL,
  "ua" text NOT NULL
);

CREATE INDEX "downloads_id" ON "downloads" ("id");
