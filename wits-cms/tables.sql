DROP TABLE IF EXISTS incentives;
CREATE TABLE incentives
(
  id              smallint unsigned NOT NULL auto_increment,
  title           varchar(255) NOT NULL,                      # Full title of the article
  summary         text NOT NULL,                              # A short summary of the article
  author		  varchar(255) NOT NULL,                      # Published by
  imageExtension  varchar(255) NOT NULL,                      # The filename extension of the article's full-size and thumbnail images

  PRIMARY KEY     (id)
);

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

DROP TABLE IF EXISTS communityMembers;
CREATE TABLE communityMembers
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

DROP TABLE IF EXISTS testimonials;
CREATE TABLE testimonials
(
  id				smallint unsigned NOT NULL auto_increment,
  person          	varchar(255) NOT NULL,                      # Full title of the article
  title				varchar(255) NOT NULL,                    	# A short summary of the article
  summary		  	text NOT NULL,						# When the event is happening
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

DROP TABLE IF EXISTS texts;
CREATE TABLE texts
(
  id				smallint unsigned NOT NULL auto_increment,
  title				varchar(255) NOT NULL,                    	# A short summary of the article
    summary				text NOT NULL,                    	# A short summary of the article
	author		  	varchar(255) NOT NULL,                      # Published by
  
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

DROP TABLE IF EXISTS mentors;
CREATE TABLE mentors
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