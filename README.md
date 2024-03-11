![logoCooking](https://github.com/anastazjaW01/simpleCookingBlog/assets/126695947/d19c646e-2654-4707-9a12-4d97e052d866)




# SimpleCookingBlog 


Simple Cooking Blog is a web application that serves as a culinary blog with the ability to create, edit and delete posts, add comments and likes. The application allows you to register, log in and manage from the admin level.

### Registration and login



https://github.com/anastazjaW01/simpleCookingBlog/assets/126695947/bd8be297-79f4-4384-93c3-65f72ed01d9e



### Create post



https://github.com/anastazjaW01/simpleCookingBlog/assets/126695947/b06e4b08-431a-4ac4-8ccb-c3480f8c00da



### Admin view



https://github.com/anastazjaW01/simpleCookingBlog/assets/126695947/4ec33c48-b153-47ab-b0ce-bbb9323ae838



## Aplication Features 

### Adding Posts
- Adding posts by a logged in user. Determining the title, recipe text, ingredients, selecting a photo for the post, time needed to complete, number of servings, categories and difficulty level.

### Editing Posts
- Ability to edit your posts.

### Deleting Posts
- Ability to delete your posts along with all photos and comments on the post.

### Adding Comments
- Ability to add comments to posts by logged in users.

### Adding Likes
- Ability to add like to posts by logged in users.

### User Management Panel
- User panel containing all user postsUser panel containing all user posts.

### Admin Management Panel
- Admin management panel containing:
  - All user posts can be edited and deleted,
  - All user comments can be deleted,
  - List of all users with the option to delete.

### Customization
- Changing the color theme.

### Addictional
- Sorting posts by category
- Search for posts by keyword

### Sign Up
- Registration combined with simple validation and reCAPTCHA v3.

### Sign In
- Login with "remember me" and "forgot password" features.

## Installation Process

- Install XAMPP tool version 3.3.0.
- Place the application folder in the XAMPP tool directory named htdocs (\xampp\htdocs).
- Launch the XAMPP tool.
- Click the start button for both the Apache and MySQL modules.
- Open your web browser and type localhost/phpmyadmin in the address bar.
- Click the Import button.
- Choose the cookingblog.sql file from the database folder located in the application directory.
- Click the Import button at the bottom.
- Enter localhost/simpleCookingBlog in the address bar.

## Technologies

- HTML5
- CSS3
- JS ES2023
- Bootstrap 5.3
- PHP 8.2.4

## API Reference

### reCAPTCHA
#### Create .htaccess

``````htaccess
SetEnv KEY = value
``````


| Parameter | Description                |
| :-------- | :------------------------- |
| `key`     | **Required**. Your API key |

To create a key, go to https://www.google.com/recaptcha/admin/create, choose reCAPTCHA v3 and add to domain:

```

  localhost

```

## Database Config

### database 
#### Add to .htaccess

``````htaccess
SetEnv DB_CONN = value
``````


| Parameter | Description                |
| :-------- | :------------------------- |
| `key`     | **Required**. Your API key |
