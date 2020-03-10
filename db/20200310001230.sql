/*
PostgreSQL Backup
Database: mafaaza/public
Backup Time: 2020-03-10 00:12:31
*/

DROP SEQUENCE IF EXISTS "public"."failed_jobs_id_seq";
DROP SEQUENCE IF EXISTS "public"."migrations_id_seq";
DROP SEQUENCE IF EXISTS "public"."order_details_id_seq";
DROP SEQUENCE IF EXISTS "public"."orders_id_seq";
DROP SEQUENCE IF EXISTS "public"."products_id_seq";
DROP SEQUENCE IF EXISTS "public"."users_id_seq";
DROP TABLE IF EXISTS "public"."failed_jobs";
DROP TABLE IF EXISTS "public"."migrations";
DROP TABLE IF EXISTS "public"."order_details";
DROP TABLE IF EXISTS "public"."orders";
DROP TABLE IF EXISTS "public"."products";
DROP TABLE IF EXISTS "public"."users";
CREATE SEQUENCE "failed_jobs_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
CREATE SEQUENCE "migrations_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
CREATE SEQUENCE "order_details_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
CREATE SEQUENCE "orders_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
CREATE SEQUENCE "products_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
CREATE SEQUENCE "users_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
CREATE TABLE "failed_jobs" (
  "id" int8 NOT NULL DEFAULT nextval('failed_jobs_id_seq'::regclass),
  "connection" text COLLATE "pg_catalog"."default" NOT NULL,
  "queue" text COLLATE "pg_catalog"."default" NOT NULL,
  "payload" text COLLATE "pg_catalog"."default" NOT NULL,
  "exception" text COLLATE "pg_catalog"."default" NOT NULL,
  "failed_at" timestamp(0) NOT NULL DEFAULT now()
)
;
ALTER TABLE "failed_jobs" OWNER TO "postgres";
CREATE TABLE "migrations" (
  "id" int4 NOT NULL DEFAULT nextval('migrations_id_seq'::regclass),
  "migration" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "batch" int4 NOT NULL
)
;
ALTER TABLE "migrations" OWNER TO "postgres";
CREATE TABLE "order_details" (
  "id" int8 NOT NULL DEFAULT nextval('order_details_id_seq'::regclass),
  "product_id" int4 NOT NULL,
  "order_id" int4 NOT NULL,
  "quantity" int4 NOT NULL,
  "price" int4 NOT NULL,
  "amount" int4 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "order_details" OWNER TO "postgres";
CREATE TABLE "orders" (
  "id" int8 NOT NULL DEFAULT nextval('orders_id_seq'::regclass),
  "code" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "user_id" int4 NOT NULL,
  "status" bool NOT NULL DEFAULT false,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "address" text COLLATE "pg_catalog"."default",
  "grand_total" int8
)
;
ALTER TABLE "orders" OWNER TO "postgres";
CREATE TABLE "products" (
  "id" int8 NOT NULL DEFAULT nextval('products_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "price" int4 NOT NULL,
  "quantity" int4 NOT NULL,
  "description" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "products" OWNER TO "postgres";
CREATE TABLE "users" (
  "id" int8 NOT NULL DEFAULT nextval('users_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "role" int4 NOT NULL DEFAULT 0,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "users" OWNER TO "postgres";
BEGIN;
LOCK TABLE "public"."failed_jobs" IN SHARE MODE;
DELETE FROM "public"."failed_jobs";
COMMIT;
BEGIN;
LOCK TABLE "public"."migrations" IN SHARE MODE;
DELETE FROM "public"."migrations";
INSERT INTO "public"."migrations" ("id","migration","batch") VALUES (16, '2014_10_12_000000_create_users_table', 1),(17, '2019_08_19_000000_create_failed_jobs_table', 1),(18, '2020_03_09_142004_create_products_table', 1),(19, '2020_03_09_142033_create_orders_table', 1),(20, '2020_03_09_142843_create_order_details_table', 1);
COMMIT;
BEGIN;
LOCK TABLE "public"."order_details" IN SHARE MODE;
DELETE FROM "public"."order_details";
INSERT INTO "public"."order_details" ("id","product_id","order_id","quantity","price","amount","created_at","updated_at") VALUES (5, 1, 7, 1, 10000, 10000, '2020-03-09 16:51:45', '2020-03-09 16:51:45'),(6, 2, 7, 1, 20000, 20000, '2020-03-09 16:51:45', '2020-03-09 16:51:45'),(7, 2, 8, 1, 20000, 20000, '2020-03-09 16:53:17', '2020-03-09 16:53:17'),(8, 3, 8, 1, 25000, 25000, '2020-03-09 16:53:17', '2020-03-09 16:53:17'),(9, 1, 9, 1, 10000, 10000, '2020-03-09 17:11:25', '2020-03-09 17:11:25');
COMMIT;
BEGIN;
LOCK TABLE "public"."orders" IN SHARE MODE;
DELETE FROM "public"."orders";
INSERT INTO "public"."orders" ("id","code","user_id","status","created_at","updated_at","address","grand_total") VALUES (7, 'ODR-1583772705', 1, 'f', '2020-03-09 16:51:45', '2020-03-09 16:51:45', NULL, 30000),(8, 'ODR-1583772797', 1, 'f', '2020-03-09 16:53:17', '2020-03-09 16:53:17', NULL, 45000),(9, 'ODR-1583773884', 1, 'f', '2020-03-09 17:11:24', '2020-03-09 17:11:25', NULL, 10000);
COMMIT;
BEGIN;
LOCK TABLE "public"."products" IN SHARE MODE;
DELETE FROM "public"."products";
INSERT INTO "public"."products" ("id","name","price","quantity","description","created_at","updated_at") VALUES (2, 'ProductB', 20000, 8, 'Product B Adalah Product B', '2020-03-09 21:55:19', '2020-03-09 16:53:17'),(3, 'ProductC', 25000, 9, 'Product C Adalah Product C', '2020-03-09 21:55:26', '2020-03-09 16:53:17'),(1, 'ProductA', 10000, 8, 'Product A Adalah Product A', '2020-03-09 21:55:13', '2020-03-09 17:11:25');
COMMIT;
BEGIN;
LOCK TABLE "public"."users" IN SHARE MODE;
DELETE FROM "public"."users";
INSERT INTO "public"."users" ("id","name","email","password","role","created_at","updated_at") VALUES (3, 'customer', 'customer@customer.com', '$2y$10$r4rGcVULDwWXZHzJ4nCTnOp.zRppNd1rt5lD9gUr0x2siuan0psNW', 0, '2020-03-09 21:55:42', '2020-03-09 21:55:50'),(1, 'admin', 'admin@admin.com', '$2y$10$6WlsxjYKFVcl8jCAINcZBOjsAxrlRrsRPr4Pru98mkXCF6a7GybGS', 1, '2020-03-09 21:55:39', '2020-03-09 21:55:47');
COMMIT;
ALTER TABLE "failed_jobs" ADD CONSTRAINT "failed_jobs_pkey" PRIMARY KEY ("id");
ALTER TABLE "migrations" ADD CONSTRAINT "migrations_pkey" PRIMARY KEY ("id");
ALTER TABLE "order_details" ADD CONSTRAINT "order_details_pkey" PRIMARY KEY ("id");
ALTER TABLE "orders" ADD CONSTRAINT "orders_pkey" PRIMARY KEY ("id");
ALTER TABLE "products" ADD CONSTRAINT "products_pkey" PRIMARY KEY ("id");
ALTER TABLE "users" ADD CONSTRAINT "users_pkey" PRIMARY KEY ("id");
ALTER TABLE "order_details" ADD CONSTRAINT "order_details_order_id_foreign" FOREIGN KEY ("order_id") REFERENCES "public"."orders" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "order_details" ADD CONSTRAINT "order_details_product_id_foreign" FOREIGN KEY ("product_id") REFERENCES "public"."products" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "orders" ADD CONSTRAINT "orders_user_id_foreign" FOREIGN KEY ("user_id") REFERENCES "public"."users" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "users" ADD CONSTRAINT "users_email_unique" UNIQUE ("email");
ALTER SEQUENCE "failed_jobs_id_seq"
OWNED BY "failed_jobs"."id";
SELECT setval('"failed_jobs_id_seq"', 2, false);
ALTER SEQUENCE "failed_jobs_id_seq" OWNER TO "postgres";
ALTER SEQUENCE "migrations_id_seq"
OWNED BY "migrations"."id";
SELECT setval('"migrations_id_seq"', 21, true);
ALTER SEQUENCE "migrations_id_seq" OWNER TO "postgres";
ALTER SEQUENCE "order_details_id_seq"
OWNED BY "order_details"."id";
SELECT setval('"order_details_id_seq"', 10, true);
ALTER SEQUENCE "order_details_id_seq" OWNER TO "postgres";
ALTER SEQUENCE "orders_id_seq"
OWNED BY "orders"."id";
SELECT setval('"orders_id_seq"', 10, true);
ALTER SEQUENCE "orders_id_seq" OWNER TO "postgres";
ALTER SEQUENCE "products_id_seq"
OWNED BY "products"."id";
SELECT setval('"products_id_seq"', 4, true);
ALTER SEQUENCE "products_id_seq" OWNER TO "postgres";
ALTER SEQUENCE "users_id_seq"
OWNED BY "users"."id";
SELECT setval('"users_id_seq"', 4, true);
ALTER SEQUENCE "users_id_seq" OWNER TO "postgres";
