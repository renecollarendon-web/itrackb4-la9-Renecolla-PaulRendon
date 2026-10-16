ITRACKB4 - Laboratory Activity 9

F1: Which column did you make nullable, and why that one and not another?

I made the `remarks` column nullable because it holds optional notes about a movie, and not every movie needs a remark. The other columns like `title`, `genre`, `rating`, `director`, and `year` are required because the filters and detail page depend on them. If I made `title` nullable, a movie could exist with no name, which would break the list display. Choosing `remarks` was deliberate because it is the only field that is truly optional for the visitor.


F2: Which step failed first for you, and what did the error say?

The first step that failed was creating a record in Tinker before adding `$fillable` to the Movie model. The error said `MassAssignmentException: Add [title] to fillable property to allow mass assignment on [App\Models\Movie]`. This happened because Laravel blocks mass assignment by default to protect the database. After I added the `$fillable` list, the same command worked and the record was saved.

F3: You changed no Blade file in Part D, yet your pages still work. Why not?

I did not edit any Blade file because only the controller changed, not the views. The Blade files still receive the same `$movies` and `$movie` variables, so they do not care whether the data came from a JSON file or a database. As long as the variable names and structure stay the same, the views render correctly. This is the benefit of separating the controller from the view in Laravel.

