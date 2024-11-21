CREATE TABLE Cybersecurity_Specialists (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Full_Name VARCHAR(150) NOT NULL,
    Email VARCHAR(150) NOT NULL UNIQUE,
    Phone VARCHAR(15) NOT NULL,
    Specialization VARCHAR(100) NOT NULL,
    Years_of_Experience INT CHECK (Years_of_Experience >= 0),
    Certifications VARCHAR(255)
);
