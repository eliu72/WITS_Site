NEXT STEPS:
- link for community member, wits, alumni, mentors
- link for sponsors

TABLES.sql

1. incentives DONE
- id
- publicationDate
- title
- summary
- author
- img: file path (implement later) or image type?


3. events (inherit from incentives)
- id
+ type
- title
- summary
+ eventDate
+ eventTime
- img
- publicationDate
- author

4. members (inherit from community_members)
- id
- person
- title
- summary
- img
- author


5. sponsors (inherit from incentives)
- id
- publicationDate
- title
- author
+ tier / summary?
- img
(doesn't have a summary...)

2. testimonials (inherit from community_members)
- id 
- publicationDate
- person
- title
- summary
- img
- author

6. community_members (inherit from members)
- id 
- publicationDate
+ person
- title
- summary
- img
- author


7. podcasts
8. blogs
9. alumni
10. mentors
11. initiatives