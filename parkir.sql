-- ----------------------------
-- Table structure for LANGGANAN_HARIAN
-- ----------------------------

GO
CREATE TABLE [dbo].[LANGGANAN_HARIAN] (
[NO_PLAT] varchar(10) NOT NULL DEFAULT ((1)) ,
[TGL_AWAL_KEANGGOTAAN] date NOT NULL ,
[ID_CUSTOMER] varchar(5) NOT NULL ,
[SATUAN_WAKTU] varchar(1) NOT NULL DEFAULT ((1)) ,
[JML_WAKTU] real NULL ,
[TGL_AKHIR_KEANGGOTAAN] date NULL ,
[ID_JENIS_KENDARAAN] nvarchar(1) NOT NULL ,
[RATE] money NOT NULL DEFAULT ((0)) ,
[AKTIVE_NON] bit NOT NULL DEFAULT ((0)) ,
[LOKASI] nvarchar(3) NOT NULL ,
[parent] varchar(5) NULL DEFAULT ((0)) ,
[USR_SPV] nvarchar(50) NULL ,
[USR_OPR] nvarchar(50) NULL ,
[USR_KEU] nvarchar(50) NULL ,
[NO_PENR_KAS] nvarchar(20) NULL ,
[NO_KWITANSI] nvarchar(12) NULL ,
[FOC] bit NOT NULL DEFAULT ((0)) ,
[KONTRAK] varchar(100) NOT NULL ,
[ID_CARD] varchar(20) NULL ,
[TIPE_KENDARAAN] varchar(1) NULL DEFAULT ((1)) 
)

-- ----------------------------
-- Table structure for TRANSAKSI
-- ----------------------------
GO
CREATE TABLE [dbo].[TRANSAKSI] (
[NO_PLAT] varchar(10) NOT NULL ,
[ID_CARD] varchar(20) NULL DEFAULT ((0)) ,
[NO_KARTU] varchar(18) NOT NULL ,
[ID_JENIS_KENDARAAN] nvarchar(1) NOT NULL ,
[MERK] nvarchar(20) NULL ,
[TGL_AWAL_KEANGGOTAAN] date NULL ,
[TGL_MASUK] datetime NOT NULL ,
[TGL_KELUAR] datetime NULL ,
[LAMA] real NULL ,
[ONGKOS] money NULL DEFAULT ((0)) ,
[DENDA] money NULL DEFAULT ((0)) ,
[USR_OPR_in] nvarchar(50) NULL ,
[USR_OPR_out] nvarchar(50) NULL ,
[USR_KEU] nvarchar(50) NULL ,
[USR_SPV] nvarchar(50) NULL ,
[NO_PENR_KAS] nvarchar(20) NULL ,
[nofaktur] varchar(50) NULL ,
[POS_MASUK] varchar(4) NOT NULL ,
[POS_KELUAR] varchar(4) NULL ,
[LUNAS] char(1) NULL DEFAULT ((0)) ,
[status] bit NOT NULL DEFAULT ((0)) ,
[TGL_void] datetime NULL ,
[catatan] nvarchar(100) NULL DEFAULT ((0)) ,
[LOKASI] nvarchar(3) NOT NULL ,
[CODE] varchar(16) NULL ,
[tgl_setor] datetime NULL ,
[usr_opr_mid] nvarchar(50) NULL ,
[EDIT] bit NULL ,
[cashless_trans_report] nvarchar(100) NULL ,
[settlement] int NULL 
)
