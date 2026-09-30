ITRACKB4 - Laboratory Activity 7

Q1: Your form sends data with POST rather than GET. Explain what would go wrong if it used GET instead. Your answer should say something about what a browser does when a page is refreshed.

Answer:
If the form used GET, all the data the visitor typed would be placed in the URL instead of the request body. When the visitor refreshes the page, the browser simply repeats the last request, which would be the GET request with all the data still in the URL. That means the record would be saved again every time the page is refreshed. Using POST avoids this because POST is not safe to repeat, and the redirect after saving changes the last request into a harmless GET.

Q2: When validation fails, your controller does not run the code that saves the record — and you did not write an if statement to stop it. Explain what actually stops it, and where the visitor ends up.

Answer:
The validate() method stops the controller on its own when any rule fails. It throws a validation exception, so the lines after it never run, even without an if statement. Laravel then redirects the visitor back to the form page and puts the error messages into the session. That is why the visitor lands back on the create page with the errors showing.

Q3: Your success message is displayed from the layout, which renders on every page. Explain why it does not appear on every page.

Answer:
The success message is a flash message, which means it is stored in the session for exactly one request only. Even though the layout renders on every page, session('success') only has a value on the first request after the redirect. On the next request, the value is already gone, so the message does not show again. That is why the layout can check for it everywhere without the message appearing everywhere.

