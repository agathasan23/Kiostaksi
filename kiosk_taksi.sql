-- ----------------------------
-- Table structure for cancel_order
-- ----------------------------
DROP TABLE IF EXISTS "public"."cancel_order";
CREATE TABLE "public"."cancel_order" (
"id" int4 DEFAULT nextval('cancel_order_id_seq'::regclass) NOT NULL,
"date_cancel" timestamp(6),
"taxi_id" int4,
"reason_cancel" text COLLATE "default",
"trans_id" int4
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Table structure for kiosks
-- ----------------------------
DROP TABLE IF EXISTS "public"."kiosks";
CREATE TABLE "public"."kiosks" (
"id" varchar(4) COLLATE "default" NOT NULL,
"name" varchar(30) COLLATE "default" NOT NULL,
"location" varchar(50) COLLATE "default" NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Table structure for modules
-- ----------------------------
DROP TABLE IF EXISTS "public"."modules";
CREATE TABLE "public"."modules" (
"id" int4 DEFAULT nextval('modules_id_seq'::regclass) NOT NULL,
"module" varchar(50) COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Table structure for operators
-- ----------------------------
DROP TABLE IF EXISTS "public"."operators";
CREATE TABLE "public"."operators" (
"id" int4 DEFAULT nextval('operator_id_seq'::regclass) NOT NULL,
"name" varchar(50) COLLATE "default" NOT NULL,
"deposit" numeric NOT NULL,
"company" varchar(75) COLLATE "default",
"address" varchar(100) COLLATE "default",
"phone" varchar(15) COLLATE "default",
"logo" varchar(20) COLLATE "default",
"taxi" bool NOT NULL,
"rentcar" bool NOT NULL,
"surcharge" numeric NOT NULL,
"quota" int4 NOT NULL,
"vehicle_type" int4 DEFAULT 1 NOT NULL
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."operators" IS 'master data operator taxi dan rent car';

-- ----------------------------
-- Table structure for ready_line
-- ----------------------------
DROP TABLE IF EXISTS "public"."ready_line";
CREATE TABLE "public"."ready_line" (
"id" int4 DEFAULT nextval('ready_line_id_seq'::regclass) NOT NULL,
"taxi_id" int4 NOT NULL,
"rfid_code" varchar(20) COLLATE "default" NOT NULL,
"entry_ready_line" timestamp(6),
"exit_pengendapan" timestamp(6) NOT NULL,
"status" int4,
"transactions_id" int4 NOT NULL
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."ready_line" IS 'slot / ready line';
COMMENT ON COLUMN "public"."ready_line"."status" IS '0 = on the way, 1 = ready, 2 = booked, 3 = without order';

-- ----------------------------
-- Table structure for rights
-- ----------------------------
DROP TABLE IF EXISTS "public"."rights";
CREATE TABLE "public"."rights" (
"id" int4 DEFAULT nextval('rights_id_seq'::regclass) NOT NULL,
"right" varchar(50) COLLATE "default" NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS "public"."roles";
CREATE TABLE "public"."roles" (
"id" int4 DEFAULT nextval('role_id_seq'::regclass) NOT NULL,
"name" varchar(20) COLLATE "default" NOT NULL
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."roles" IS 'role untuk akses sistem';

-- ----------------------------
-- Table structure for setoran
-- ----------------------------
DROP TABLE IF EXISTS "public"."setoran";
CREATE TABLE "public"."setoran" (
"id" int4 DEFAULT nextval('setoran_id_seq'::regclass) NOT NULL,
"supervisor_id" int4 NOT NULL,
"timestamp" timestamp(6) NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS "public"."settings";
CREATE TABLE "public"."settings" (
"id" int4 DEFAULT nextval('setting_id_seq'::regclass) NOT NULL,
"name" varchar(30) COLLATE "default" NOT NULL,
"value" varchar(50) COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Table structure for special_counting
-- ----------------------------
DROP TABLE IF EXISTS "public"."special_counting";
CREATE TABLE "public"."special_counting" (
"id" int4 DEFAULT nextval('special_counting_id_seq'::regclass) NOT NULL,
"taxi_id" int4,
"trans_date" timestamp(6),
"operator_user" int4
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Table structure for taxis
-- ----------------------------
DROP TABLE IF EXISTS "public"."taxis";
CREATE TABLE "public"."taxis" (
"id" int4 DEFAULT nextval('taxi_id_seq'::regclass) NOT NULL,
"operator_id" int4,
"vehicle_type_id" int4,
"plate_no" varchar(10) COLLATE "default" NOT NULL,
"driver_name" varchar(50) COLLATE "default",
"is_active" bool NOT NULL,
"no_lambung" varchar(5) COLLATE "default" NOT NULL,
"year" varchar(4) COLLATE "default",
"colour" varchar(20) COLLATE "default",
"merk" varchar(30) COLLATE "default"
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."taxis" IS 'master data taxi dan rent car';

-- ----------------------------
-- Table structure for transactions
-- ----------------------------
DROP TABLE IF EXISTS "public"."transactions";
CREATE TABLE "public"."transactions" (
"id" int4 DEFAULT nextval('transactions_id_seq'::regclass) NOT NULL,
"taxi_id" int4 NOT NULL,
"trans_date" timestamp(6) NOT NULL,
"rfid_code" varchar(20) COLLATE "default" NOT NULL,
"surcharge" numeric NOT NULL,
"entry_ready_line" timestamp(6),
"exit_ready_line" timestamp(6),
"trans_kiosk_id" int4,
"pax_name" varchar(30) COLLATE "default",
"pax_nationality" varchar(30) COLLATE "default",
"pax_flight_from" varchar(20) COLLATE "default",
"cashier_id" int4 NOT NULL,
"operator_id" int4,
"setor_date" timestamp(6),
"setor_id" int4,
"payment_type" int4,
"airport_code" varchar(3) COLLATE "default" NOT NULL,
"pairing_time" timestamp(6),
"status" int4 DEFAULT 1 NOT NULL,
"pax_destination" varchar(100) COLLATE "default",
"remark" varchar(255) COLLATE "default",
"cost" numeric
)
WITH (OIDS=FALSE)

;
COMMENT ON COLUMN "public"."transactions"."cashier_id" IS 'operator di pengendapan';
COMMENT ON COLUMN "public"."transactions"."operator_id" IS 'operator pairing';
COMMENT ON COLUMN "public"."transactions"."setor_date" IS 'tanggal setoran kasir';
COMMENT ON COLUMN "public"."transactions"."setor_id" IS 'setoran supervisor';
COMMENT ON COLUMN "public"."transactions"."payment_type" IS '1 = cash, 2 = cashless, 3 = deposit';
COMMENT ON COLUMN "public"."transactions"."status" IS '1 = exit with order, 2 = exit without order';

-- ----------------------------
-- Table structure for transactions_kiosk
-- ----------------------------
DROP TABLE IF EXISTS "public"."transactions_kiosk";
CREATE TABLE "public"."transactions_kiosk" (
"id" int4 DEFAULT nextval('transaction_kiosk_id_seq'::regclass) NOT NULL,
"vehicle_type_id" int4 NOT NULL,
"timestamp" timestamp(6) NOT NULL,
"code" varchar(17) COLLATE "default" NOT NULL,
"zone_id" int4,
"is_active" bool NOT NULL,
"kiosk_id" varchar(4) COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "public"."users";
CREATE TABLE "public"."users" (
"id" int4 DEFAULT nextval('user_id_seq'::regclass) NOT NULL,
"name" varchar(50) COLLATE "default" NOT NULL,
"unit" varchar(100) COLLATE "default" NOT NULL,
"username" varchar(25) COLLATE "default" NOT NULL,
"password" varchar(200) COLLATE "default" NOT NULL,
"role_id" int4 NOT NULL,
"last_login" timestamp(6),
"is_active" bool DEFAULT false
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Table structure for vehicle_types
-- ----------------------------
DROP TABLE IF EXISTS "public"."vehicle_types";
CREATE TABLE "public"."vehicle_types" (
"id" int4 DEFAULT nextval('vehicle_types_id_seq'::regclass) NOT NULL,
"type" varchar(20) COLLATE "default" NOT NULL
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."vehicle_types" IS 'jenis kendaraan';

-- ----------------------------
-- Table structure for zones
-- ----------------------------
DROP TABLE IF EXISTS "public"."zones";
CREATE TABLE "public"."zones" (
"id" int4 DEFAULT nextval('zona_id_seq'::regclass) NOT NULL,
"name" varchar(50) COLLATE "default" NOT NULL,
"cost" numeric NOT NULL,
"area" varchar(250) COLLATE "default"
)
WITH (OIDS=FALSE)

;
COMMENT ON COLUMN "public"."zones"."cost" IS 'harga zona';

