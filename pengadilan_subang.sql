-- Dummy database for Pengadilan Negeri Subang
DROP DATABASE IF EXISTS pengadilan_subang;
CREATE DATABASE pengadilan_subang CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE pengadilan_subang;

-- Admin dummy
CREATE TABLE admin_users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(190) NOT NULL UNIQUE,
  password VARCHAR(190) NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
INSERT INTO admin_users (email, password) VALUES ('admin@gmail.com','admin#1234');

-- Berita
CREATE TABLE berita (
  id INT AUTO_INCREMENT PRIMARY KEY,
  judul VARCHAR(255) NOT NULL,
  isi MEDIUMTEXT NOT NULL,
  tanggal DATE NOT NULL,
  gambar VARCHAR(255) DEFAULT NULL
) ENGINE=InnoDB;
INSERT INTO berita (judul, isi, tanggal, gambar) VALUES
('Sidang Terbuka dalam Rangka HUT MA ke-79', 'Pengadilan Negeri Subang menyelenggarakan sidang terbuka dalam rangka peringatan HUT Mahkamah Agung ke-79 dengan tetap menerapkan prinsip peradilan yang terbuka dan akuntabel.', '2025-08-19', NULL),
('Peningkatan Layanan e-Court', 'Sebagai komitmen pelayanan prima, PN Subang meningkatkan pemanfaatan e-Court untuk pendaftaran perkara, pembayaran biaya perkara, dan pemanggilan elektronik.', '2025-07-01', NULL),
('Sosialisasi PTSP kepada Masyarakat', 'Pelayanan Terpadu Satu Pintu (PTSP) terus disosialisasikan guna memberikan kemudahan akses informasi dan layanan peradilan.', '2025-06-12', NULL);

-- Pegawai
CREATE TABLE pegawai (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(200) NOT NULL,
  jabatan VARCHAR(200) NOT NULL,
  foto VARCHAR(255) DEFAULT NULL
) ENGINE=InnoDB;
INSERT INTO pegawai (nama, jabatan, foto) VALUES
('Drs. Ahmad Sutisna, S.H., M.H.', 'Ketua Pengadilan Negeri Subang', NULL),
('Rina Kartika, S.H., M.H.', 'Wakil Ketua Pengadilan Negeri Subang', NULL),
('Dedi Permana, S.H.', 'Panitera Pengadilan Negeri Subang', NULL);

-- Layanan
CREATE TABLE layanan (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama_layanan VARCHAR(200) NOT NULL,
  deskripsi TEXT NOT NULL,
  link VARCHAR(255) NOT NULL
) ENGINE=InnoDB;
INSERT INTO layanan (nama_layanan, deskripsi, link) VALUES
('e-Court', 'Pendaftaran perkara dan pembayaran biaya secara elektronik.', 'https://ecourt.mahkamahagung.go.id'),
('Jadwal Sidang Online (SIPP)', 'Informasi perkara dan jadwal sidang PN Subang.', 'https://sipp.pn-subang.go.id'),
('Pelayanan Terpadu Satu Pintu (PTSP)', 'Pelayanan terpadu untuk kemudahan akses layanan peradilan.', '#');
