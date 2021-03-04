DROP TABLE IF EXISTS witsEvents;
CREATE TABLE witsEvents
(
	id              smallint unsigned NOT NULL auto_increment,
	title           varchar(255) NOT NULL,                      # Full title of the article
	eventType			varchar(255) NOT NULL,
	summary         text NOT NULL,                              # A short summary of the article
	eventDate		  date NOT NULL,							  # When the event is happening
	eventTime		  time NOT NULL, 							  # Time of the event
    eventLocation		varchar(255) NOT NULL,
	eventLink 		varchar(255) NOT NULL,
	author		  varchar(255) NOT NULL,                      # Published by
	imageExtension 	text NOT NULL,							  # File path to the image
  
  PRIMARY KEY     (id)
);

DROP TABLE IF EXISTS witsMembers;
CREATE TABLE witsMembers
(
  id				smallint unsigned NOT NULL auto_increment,
  person          	varchar(255) NOT NULL,                      # Full title of the article
  title				varchar(255) NOT NULL,                    	# A short summary of the article
  summary		  	text NOT NULL,						# When the event is happening
    url 				varchar(255) NOT NULL,

  author		  	varchar(255) NOT NULL,                      # Published by
  imageExtension			  	text NOT NULL,							  	# File path to the image
  
  PRIMARY KEY     (id)
);

DROP TABLE IF EXISTS sponsors;
CREATE TABLE sponsors
(
  id				smallint unsigned NOT NULL auto_increment,
  title				varchar(255) NOT NULL,                    	# A short summary of the article
  tier		  		text NOT NULL,						# When the event is happening
  url 				varchar(255) NOT NULL,
  author		  	varchar(255) NOT NULL,                      # Published by
  imageExtension	text NOT NULL,							  	# File path to the image
  
  PRIMARY KEY     (id)
);

DROP TABLE IF EXISTS podcasts;
CREATE TABLE podcasts
(
  id				smallint unsigned NOT NULL auto_increment,
  title				varchar(255) NOT NULL,                    	# A short summary of the article
    summary				text NOT NULL,                    	# A short summary of the article
    hyperlink varchar(255) NOT NULL,
	author		  	varchar(255) NOT NULL,                      # Published by
    imageExtension	text NOT NULL,							  	# File path to the image

  PRIMARY KEY     (id)
);

DROP TABLE IF EXISTS blogs;
CREATE TABLE blogs
(
  id				smallint unsigned NOT NULL auto_increment,
  title				varchar(255) NOT NULL,                    	# A short summary of the article
    summary				text NOT NULL,                    	# A short summary of the article
    hyperlink varchar(255) NOT NULL,
	author		  	varchar(255) NOT NULL,                      # Published by
    imageExtension	text NOT NULL,							  	# File path to the image

  PRIMARY KEY     (id)
);

DROP TABLE IF EXISTS alumni;
CREATE TABLE alumni
(
  id				smallint unsigned NOT NULL auto_increment,
  person          	varchar(255) NOT NULL,                      # Full title of the article
  title				varchar(255) NOT NULL,                    	# A short summary of the article
  summary		  	text NOT NULL,						# When the event is happening
    url 				varchar(255) NOT NULL,
  author		  	varchar(255) NOT NULL,                      # Published by
  imageExtension			  	text NOT NULL,							  	# File path to the image
  
  PRIMARY KEY     (id)
);

DROP TABLE IF EXISTS partners;
CREATE TABLE partners
(
  id				smallint unsigned NOT NULL auto_increment,
  person          	varchar(255) NOT NULL,                      # Full title of the article
  company           varchar(255) NOT NULL,
  title				varchar(255) NOT NULL,                    	# A short summary of the article
  summary		  	text NOT NULL,						# When the event is happening
    url 				varchar(255) NOT NULL,
  author		  	varchar(255) NOT NULL,                      # Published by
  imageExtension			  	text NOT NULL,							  	# File path to the image
  
  PRIMARY KEY     (id)
);

DROP TABLE IF EXISTS companies;
CREATE TABLE companies
(
  id        smallint unsigned NOT NULL auto_increment,
  name         varchar(255) NOT NULL,
  url 				varchar(255) NOT NULL,
  imageExtension			  	text NOT NULL,
  PRIMARY KEY     (id)
);