Create a simple subscription platform(only RESTful APIs with MySQL) in which users can subscribe to a website
(there can be multiple websites in the system). Whenever a new post is published on a particular website, all it's
subscribers shall receive an email with the post title and description in it. (no authentication of any kind is
required)


MUST:-

- [x] Write migrations for the required tables.
- [x] Endpoint to create a "post" for a "particular website".
- [x] Endpoint to make a user subscribe to a "particular website" with all the tiny validations included in it.
- [x] Use of command to send email to the subscribers.
- [x] Use of queues to schedule sending in background.
- No duplicate stories should get sent to subscribers.
- Deploy the code on a public github repository.

OPTIONAL:-

- [x] Seeded data of the websites.
- Open API documentation (or) Postman collection demonstrating available APIs & their usage.
- [x] Use of latest laravel version.
- Use of contracts & services.
- [x] Use of caching wherever applicable.
- [x] Use of events/listeners.

Note:-

1. Please provide special instructions(if any) to make to code base run on our local/remote platform.
