-- CREATE DATABASE

CREATE DATABASE ITS120L;
USE ITS120L



-- CREATE TABLES

CREATE TABLE Users (
    UserID INT PRIMARY KEY AUTO_INCREMENT,
    FirstName VARCHAR(50),
    LastName VARCHAR(50),
    Email VARCHAR(100),
    Password VARCHAR(255),
    BirthDate DATE,
    Gender VARCHAR(10),
    SubscriptionStatus VARCHAR(20)
);

CREATE TABLE Goal (
    GoalID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    GoalName VARCHAR(100),
    GoalType VARCHAR(50),
    StartDate DATE,
    EndDate DATE,
    Status VARCHAR(20),
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);

CREATE TABLE ProgressAnalytics (
    ProgressID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    GoalID INT,
    ProgressDate DATE,
    Metrics VARCHAR(255),
    ProgressPercentage DECIMAL(5,2),
    FOREIGN KEY (UserID) REFERENCES Users(UserID),
    FOREIGN KEY (GoalID) REFERENCES Goal(GoalID)
);

CREATE TABLE CoachingSession (
    SessionID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    SessionDate DATE,
    AdviceProvided TEXT,
    MotivationalMessage TEXT,
    HabitTip TEXT,
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);

CREATE TABLE CommunityPost (
    PostID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    PostDate DATE,
    PostContent TEXT,
    CommentsCount INT,
    LikesCount INT,
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);

CREATE TABLE WellnessFeature (
    WellnessID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    FeatureType VARCHAR(50),
    Data TEXT,
    DateRecorded DATE,
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);

CREATE TABLE DisciplineRoutine (
    RoutineID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    RoutineName VARCHAR(100),
    RoutineType VARCHAR(50),
    StartDate DATE,
    EndDate DATE,
    Status VARCHAR(20),
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);



-- CREATE USERS

INSERT INTO Users (Email, Password)
VALUES ('admin@gmail.com', 123);

INSERT INTO Users (Email, Password)
VALUES ('seanaxelv@gmail.com', 123);