# APIIT Students Blog

## Project Description

APIIT Students Blog is a comprehensive platform designed for students to engage with their campus community. This blog site provides various features such as event tracking, job postings, support services, and social media integration. The project aims to create a centralized hub where students can stay informed, share opinions, and access essential resources, enhancing their campus experience.

## Features

- **User Authentication**: Secure login and registration system for users.
- **Event Calendar**: View upcoming events and add them to your personal calendar.
- **Event Gallery**: Browse through images and videos from past events.
- **Job Vacancies**: Stay updated on job openings and apply directly through the platform.
- **Blog Posting**: Create and manage blog posts on various topics.
- **Post Category**: Categorize blog posts for easy navigation.
- **Tag Filtering for Blog Posts**: Filter blog posts based on tags for quick access.
- **Commenting**: Engage with blog posts through comments.
- **Like**: Express support by liking blog posts.
- **Search Feature**: Search for posts, events, and job vacancies with ease.
- **Instagram Feed Display**: View the latest Instagram posts directly on the site.
- **Surveys**: Participate in surveys to share feedback and opinions.
- **Anonymous Feedback**: Provide feedback anonymously to ensure privacy.
- **Contact Student Support Services**: Reach out to support services for assistance.
- **Terms and Conditions Agreement**: Users must agree to the terms and conditions before accessing certain features.

## Installation Instructions

Follow these steps to set up and run the APIIT Students Blog locally:

### Prerequisites

- PHP version 8.0 or higher
- Composer
- Laravel 9.x
- MySQL or any other supported database
- Git

### Steps

1. **Clone the Repository**:
    ```bash
    git clone https://github.com/your-username/apiit-students-blog.git
    cd apiit-students-blog
    ```

2. **Install Dependencies**:
    ```bash
    composer install
    npm install
    npm run dev
    ```

3. **Set Up Environment Variables**:
    - Copy the `.env.example` file to `.env` and update the necessary configurations (database, mail, etc.).
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Run Migrations**:
    ```bash
    php artisan migrate
    ```

5. **Seed the Database (Optional)**:
    ```bash
    php artisan db:seed
    ```

6. **Serve the Application**:
    ```bash
    php artisan serve
    ```

## Usage Instructions

1. **User Authentication**:
    - Register a new account or log in with existing credentials.
  
2. **Event Calendar**:
    - Navigate to the calendar section to view upcoming events. Click on an event to see more details.

3. **Event Gallery**:
    - Access the gallery to browse images and videos from past events.

4. **Job Vacancies**:
    - Go to the job vacancies section to explore available job opportunities. Apply directly through the platform.

5. **Blog Posting**:
    - Users with the appropriate permissions can create new blog posts from the dashboard. 

6. **Tag Filtering**:
    - Use the filter option to sort blog posts by tags for easier navigation.

7. **Instagram Feed**:
    - The latest posts from the official Instagram account are displayed in the sidebar.

8. **Surveys and Anonymous Feedback**:
    - Participate in surveys and provide anonymous feedback through the relevant sections.

9. **Support Services**:
    - Contact student support through the dedicated section on the website for any assistance.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Authors

- Gihan Tharuka 
- Drawin Akash
- Sheed Mashaud

## 5. Screenshots
![Home Page](public/screenshots/home.jpeg)
![Register Page](public/screenshots/register.jpeg)
![Login Page](public/screenshots/login.jpeg)
![About Page](public/screenshots/events.jpeg)
![Services Page](public/screenshots/event.jpeg)
![Pricing Page](public/screenshots/servey.jpeg)
![Pharmacy Page](public/screenshots/job.jpeg)
![Product Page](public/screenshots/feedback.jpeg)
![Category Page](public/screenshots/userd.jpeg)
![Booking Page](public/screenshots/admind.jpeg)
![Check out Page](public/screenshots/adminedit.jpeg)

