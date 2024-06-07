CREATE DATABASE Hotel;
USE Hotel;

-- Users table with roles
CREATE TABLE Users (
    UserID INT PRIMARY KEY AUTO_INCREMENT,
    Username VARCHAR(50) UNIQUE NOT NULL,
    Password VARCHAR(100) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    Role ENUM('Admin', 'User') DEFAULT 'User'
);

-- Rooms table to store room details
CREATE TABLE Rooms (
    RoomID INT PRIMARY KEY AUTO_INCREMENT,
    RoomNumber VARCHAR(10) UNIQUE NOT NULL,
    Description TEXT,
    Price DECIMAL(10, 2) NOT NULL,
    IsReserved BOOLEAN DEFAULT FALSE
);

-- Reservations table
CREATE TABLE Reservations (
    ReservationID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    RoomID INT,
    ReservationDate DATETIME NOT NULL,
    FOREIGN KEY (UserID) REFERENCES Users(UserID),
    FOREIGN KEY (RoomID) REFERENCES Rooms(RoomID)
);

-- Customer details for reservations
CREATE TABLE CustomerDetails (
    CustomerID INT PRIMARY KEY AUTO_INCREMENT,
    ReservationID INT,
    Name VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    PhoneNumber VARCHAR(15) NOT NULL,
    ReservationDate DATETIME NOT NULL,
    FOREIGN KEY (ReservationID) REFERENCES Reservations(ReservationID)
);

-- Reminders table to add reminders for reservations
CREATE TABLE Reminders (
    ReminderID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    ReservationID INT,
    ReminderDateTime DATETIME NOT NULL,
    FOREIGN KEY (UserID) REFERENCES Users(UserID),
    FOREIGN KEY (ReservationID) REFERENCES Reservations(ReservationID)
);
