-- Query #1
INSERT INTO clients (clientFirstName, clientLastName, clientEmail, clientPassword, comment)
VALUES ('Tony', 'Stark', 'tony@starkent.com', 'Iam1ronM@n', 'I am the real Ironman');

-- Query #2
UPDATE clients
SET clientLevel = 3
WHERE clientID = 4;

-- Query #3
UPDATE inventory
SET invDescription = REPLACE(invDescription, "small interior", "spacious interior")
WHERE invId = 12;

-- Query #4
SELECT invModel, classificationName 
From inventory JOIN carclassification ON 
inventory.classificationId = carclassification.classificationId 
WHERE classificationName = "SUV";

-- Query #5
DELETE FROM inventory
WHERE invID = 1;

-- Query #6
UPDATE inventory
SET invImage = CONCAT("/phpmotors", invImage), invThumbnail = CONCAT("/phpmotors", invThumbnail);