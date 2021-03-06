/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

UPDATE mysql.user SET Password=PASSWORD('{QH_MYSQL_ROOT_PASS}') WHERE User='root';
DELETE FROM mysql.user WHERE User='root' AND Host NOT IN ('localhost', '127.0.0.1', '::1');
DELETE FROM mysql.user WHERE User='';
DELETE FROM mysql.db WHERE Db='test' OR Db='test\_%';
CREATE DATABASE IF NOT EXISTS {QH_MYSQL_DBNAME};
CREATE USER `{QH_MYSQL_USER_NAME}`@`localhost`;
SET PASSWORD FOR `{QH_MYSQL_USER_NAME}`@`localhost` = PASSWORD('{QH_MYSQL_USER_PASS}');
GRANT ALL ON {QH_MYSQL_DBNAME}.* TO `{QH_MYSQL_USER_NAME}`@`localhost` IDENTIFIED BY '{QH_MYSQL_USER_PASS}';
GRANT ALL ON {QH_MYSQL_DBNAME}.* TO `{QH_MYSQL_USER_NAME}`@`%` IDENTIFIED BY '{QH_MYSQL_USER_PASS}';

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
