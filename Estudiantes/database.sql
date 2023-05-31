CREATE DATABASE campus;

use campus;


CREATE TABLE campers(
    id  INT primary key AUTO_INCREMENT,
    NOMBRES VARCHAR (50) NOT NULL,
    dirrecion VARCHAR (40) NOT NULL,
    logros VARCHAR (60) NOT NULL
);

CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    idCamper INT NOT NULL,
    email VARCHAR (80) NOT NULL,
    username VARCHAR(64) NOT NULL,
    password VARCHAR (72) NOT NULL,
    FOREIGN KEY (idCamper) REFERENCES campers(id)

)
