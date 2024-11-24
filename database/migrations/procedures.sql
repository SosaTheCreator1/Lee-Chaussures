DELIMITER ##
CREATE PROCEDURE sp_ins_cli_yair(
    IN p_name VARCHAR(30),
    IN p_lastName VARCHAR(30),
    IN p_password VARCHAR(50),
    IN p_email VARCHAR(50),
    IN p_phone VARCHAR(20),
    IN p_location VARCHAR(100)
    IN p_about_me VARCHAR(255),
    IN p_status VARCHAR(50)
)
BEGIN
    INSERT INTO user ('name','email','password','phone','location','about_me', 'status') VALUES (p_name,p_email,p_password,p_phone,p_location,p_about_me, p_status');
END ##

////////////////////////////////////////////////////////////////////////////////////////////////1
DELIMITER;

DELIMITER ##
CREATE PROCEDURE sp_up_cli_yair(
    IN p_name VARCHAR(30),
    IN p_lastName VARCHAR(30),
    IN p_password VARCHAR(50),
    IN p_email VARCHAR(50),
    IN p_phone VARCHAR(20),
    IN p_location VARCHAR(100)
    IN p_about_me VARCHAR(255),
    IN p_status VARCHAR(50)
)
BEGIN
    UPDATE user SET name = p_name, email = p_email, password = p_password, phone = p_phone, location = p_location, p_about_me = about_me, status = p_status;
END ##
DELIMITER;

///////////////////////////////////////////////////////////////////////////////////
DELIMITER ##

CREATE PROCEDURE sp_del_cli_yair(
    IN p_id INT
)
BEGIN
    DELETE FROM user WHERE id = p_id;
END ##
DELIMITER;



///////////////////////////////////////////////////////////////////////////////////
DELIMITER ##

CREATE PROCEDURE sp_get_cli_yair()
BEGIN
    SELECT * FROM user;
END ##
DELIMITER;