INSERT INTO businessinv
(product, brand, qty, businessID)
VALUES
  ('Riceland','Riceland American Jazmine Rice', 12, 1),
  ('Caress','Caress Velvet Bliss Ultra Silkening Beauty Bar - 6 Ct', 22, 1),
  ('Earth''s Best','Earth''s Best Organic Fruit Yogurt Smoothie Mied Berry', 13, 1),
  ('Boar''s Head','Boar''s Head Sliced White American Cheese - 120 Ct', 14, 1),
  ('Back To Nature','Back To Nature Gluten Free White Cheddar Rice Thin Crackers', 12, 1),
  ('Sally Hansen','Sally Hansen Nail Color Magnetic 903 Silver Elements', 32, 1),
  ('Twinings Of London','Twinings Of London Classics Lady Grey Tea - 20 Ct', 34, 1),
  ('Lea & Perrins','Lea & Perrins Marinade In-a-bag Cracked Peppercorn', 44, 1),
  ('Van De Kamp''s','Van De Kamp''s Fillets Beer Battered - 10 Ct', 23, 1),
  ('Ahold','Ahold Cocoa Almonds', 15, 1),
  ('Honest Tea','Honest Tea Peach White Tea', 14, 2),
  ('Mueller','Mueller Sport Care Basic Support Level Medium Elastic Knee Support', 54, 2),
  ('Garnier Nutritioniste','Garnier Nutritioniste Moisture Rescue Fresh Cleansing Foam', 63, 2),
  ('Pamprin','Pamprin Maximum Strength Multi-symptom Menstrual Pain Relief', 12, 2),
  ('Suave','Suave Naturals Moisturizing Body Wash Creamy Tropical Coconut', 22, 2),
  ('Burt''s Bees','Burt''s Bees Daily Moisturizing Cream Sensitive', 32, 2),
  ('Ducal','Ducal Refried Red Beans', 12, 2),
  ('Scotch','Scotch Removable Clear Mounting Squares - 35 Ct', 1, 2),
  ('Careone','Careone Family Comb Set - 8 Ct', 23, 2),
  ('Usda Produce','Plums Black', 18, 2),
  ('Doctor''s Best','Doctor''s Best Best Curcumin C3 Complex 1000mg Tablets - 120 Ct', 13, 3),
  ('Betty Crocker','Betty Crocker Twin Pack Real Potatoes Scalloped 2 Pouches For 2 Meals - 2 Pk', 15, 3),
  ('Reese','Reese Mandarin Oranges Segments In Light Syrup', 18, 3),
  ('Smart Living','Smart Living Charcoal Lighter Fluid', 92, 3),
  ('Hood','Hood Latte Iced Coffee Drink Vanilla Latte', 12, 3),
  ('Triaminic','Triaminic Syrup Night Time Cold & Cough Grape 4oz', 28, 3),
  ('Morton','Morton Kosher Salt Coarse', 13, 3),
  ('Usda Produce','Guava', 45, 3),
  ('Heinz','Heinz Tomato Ketchup - 2 Ct', 74, 3),
  ('Petmate','Petmate Booda Bones Steak, Bacon & Chicken Flavors - 9 Ct', 3, 3);
  
  
INSERT INTO json
(classification, postal_code, city, recalling_firm, state, reason_for_recall, country, product_description)
VALUES
  ('II', 07522, 'Paterson', 'Boar''s Head', 'NJ', 'Haram', 'USA', 'Boar''s Head Sliced White American Cheese - 120 Ct'),
  ('I', 07522, 'Paterson', 'Ahold', 'NJ', 'Grade A Carcinogen', 'USA', 'Ahold Cocoa Almonds'),
  ('I', 07522, 'Paterson', 'Lea & Perrins', 'NJ', 'Contaminated', 'USA', 'Lea & Perrins Marinade In-a-bag Cracked Peppercorn'),
  ('II', 07302, 'Jersey City', 'Mueller', 'NJ', 'Breaks Knees', 'USA', 'Mueller Sport Care Basic Support Level Medium Elastic Knee Support'),
  ('II', 07302, 'Jersey City', 'Suave', 'NJ', 'Blinding', 'USA', 'Suave Naturals Moisturizing Body Wash Creamy Tropical Coconut'),
  ('I', 07302, 'Jersey City', 'Burt''s Bees', 'NJ', 'Extinction', 'USA', 'Burt''s Bees Daily Moisturizing Cream Sensitive'),
  ('II', 07302, 'Jersey City', 'Usda Produce', 'NJ', 'Toxic', 'USA', 'Plums Black'),
  ('I', 07302, 'Jersey City', 'Ducal', 'NJ', 'Gassy', 'USA', 'Ducal Refried Red Beans'),
  ('II', 07302, 'Jersey City', 'Petmate', 'NJ', 'Haram', 'USA', 'Petmate Booda Bones Steak, Bacon & Chicken Flavors - 9 Ct');
