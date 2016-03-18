--
-- Table structure for table 'players'
--
CREATE TABLE IF NOT EXISTS players (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50),
  credits INT,
  lifetime_spins INT,
  salt CHAR(22)
);


