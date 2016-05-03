/**
 *	DummyData for Silver Linings guildsite.
 */
 
 USE `SLSite`;
 
/**
 *	Users (Website Users)
 */
 
 CALL `Register_User`('masta@guild.com','GuildMaster', 'god');
 CALL `Register_User`('firepower@guild.com','FireTrainer', '123');
 CALL `Register_User`('theflow@guild.com','WaterTrainer', '123');
 CALL `Register_User`('averagejoe@guild.com','NormalTrainer', '123');
 CALL `Register_User`('psych@guild.com','PsychicTrainer', '123');
 CALL `Register_User`('gethard@guild.com','RockTrainer', '123');
 CALL `Register_User`('purplecloud@guild.com','PoisonTrainer', '123');
 CALL `Register_User`('drehgenbern@guild.com','DragonTrainer', '123');
 
/**
 *	Characters
 */
 CALL `Add_Character`('GuildMaster', 'Magikarp','GOD OF THE SEAS','Witch',55,1000,1000);
 CALL `Add_Character`('GuildMaster', 'Genger','Get Spookered','Wizard',29,1000,1000);
 CALL `Add_Character`('GuildMaster', 'Mankey','MonkeyBoi','Warrior',22,1000,1000);
 CALL `Add_Character`('GuildMaster', 'Nidoran','Flying Shadow','Ninja',16,1000,1000);
 CALL `Add_Character`('GuildMaster', 'Jolten','Super Fast','Tamer',32,1000,1000);
 
 CALL `Add_Character`('FireTrainer', 'Charizard','The Stubborn','Sorceress',38,1000,1000);
 CALL `Add_Character`('FireTrainer', 'Arcanine','Giant Dog','Valkyrie',34,1000,1000);
 CALL `Add_Character`('FireTrainer', 'Vulpix','Precious','Ninja',34,1000,1000);
 
 CALL `Add_Character`('WaterTrainer', 'Squirtle','Hyrdopump','Plum',15,1000,1000);
 CALL `Add_Character`('WaterTrainer', 'Poliwhirl','Wetsuit Assassin','Sorceress',41,1000,1000);
 CALL `Add_Character`('WaterTrainer', 'Slowbro','Not So Smart','Valkyrie',16,1000,1000);
 CALL `Add_Character`('WaterTrainer', 'Kingler','The King','Warrior',13,1000,1000);
 
 CALL `Add_Character`('NormalTrainer', 'Jigglypuff','Best Voice','Plum',24,1000,1000);
 CALL `Add_Character`('NormalTrainer', 'Meowth','Mo Money Mo Problems','Blader',22,1000,1000);
 CALL `Add_Character`('NormalTrainer', 'Eevee','Versatile','Kunoichi',11,1000,1000);
 CALL `Add_Character`('NormalTrainer', 'Snorlax','The Lazy','Plum',21,1000,1000);
 
 CALL `Add_Character`('PsychicTrainer', 'Alakazam','Master of Spoons','Berserker',50,1000,1000);
 CALL `Add_Character`('PsychicTrainer', 'Exeggutor','Scrambled','Witch',19,1000,1000);
 CALL `Add_Character`('PsychicTrainer', 'Mew','Omega','Kunoichi',42,1000,1000);
 
 CALL `Add_Character`('RockTrainer', 'Diglet','Expert Miner','Plum',8,1000,1000);
 CALL `Add_Character`('RockTrainer', 'Onix','Stoneskin','Warrior',46,1000,1000);
 CALL `Add_Character`('RockTrainer', 'Sandslash','Desert Explorer','Blader',32,1000,1000);
 CALL `Add_Character`('RockTrainer', 'Cubone','Too Soon','Berserker',6,1000,1000);
 
 CALL `Add_Character`('PoisonTrainer', 'Bulbasaur','He Was Number One','Wizard',52,1000,1000);
 CALL `Add_Character`('PoisonTrainer', 'Gloom','Flower Girl','Tamer',20,1000,1000);
 CALL `Add_Character`('PoisonTrainer', 'Parasect','Penny PINCHER','Warrior',18,1000,1000);
 CALL `Add_Character`('PoisonTrainer', 'Weezing','Athsmatic','Valkyrie',24,1000,1000);

 CALL `Add_Character`('DragonTrainer', 'Dragonite','Not From Sesame St','Ninja',34,1000,1000);
 CALL `Add_Character`('DragonTrainer', 'Zapdos','Legendary','Wizard',37,1000,1000);
 CALL `Add_Character`('DragonTrainer', 'Dratini','Snake Eyes','Tamer',9,1000,1000);