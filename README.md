# EduLearn

Advanced Learning Management System

# Creating PR(Pull Request) in git

- Create a new branch
  `git checkout -b branch-name`

-Commit Changes

```
   git add ./
   git commit -m "Your commit message"
```

-Push Changes
`git push origin branch-name`

-Create PR
![image](https://github.com/jjd214/eduLearn/assets/53577436/856ade97-7c96-4ba0-9902-66357b9333b7)
Then, wait for review

# Folder Strcuture

```
eduLearn
├─ components
│  ├─ footer.php
│  └─ navbar.php
├─ composer.json
├─ composer.lock
├─ controllers
│  └─ functions.php
├─ css
│  └─ style.css
├─ images
│  ├─ 13984578_5376136.ai
│  ├─ 5F56B002.png
│  ├─ 5F56B003.png
│  ├─ 5F56B004.png
│  ├─ 5F56B005.png
│  ├─ details-1.png
│  ├─ details-2.png
│  ├─ details-3.png
│  ├─ details-4.png
│  ├─ features.svg
│  ├─ ft.svg
│  ├─ hero-img.png
│  ├─ hero-img.svg
│  ├─ hero.svg
│  ├─ instructor.svg
│  ├─ login.svg
│  ├─ LogoLight.png
│  ├─ LogoLight.svg
│  ├─ LogoNormal.png
│  ├─ LogoNormal.svg
│  └─ register.svg
├─ javascript
│  ├─ main.js
│  └─ validate.js
├─ models
│  ├─ Config.php
│  └─ Registration.php
├─ partials
│  ├─ __footer.php
│  └─ __header.php
├─ php
│  └─ init.php
├─ README.md
├─ reminder.txt
├─ src
│  ├─ controll
│  │  ├─ process
│  │  └─ routes
│  └─ domain
└─ views
   ├─ admin
   │  └─ index.php
   ├─ index.php
   ├─ inner-page.php
   ├─ instructor-application.php
   ├─ login.php
   ├─ otp-input.php
   └─ register-student.php
```

# The code that causes a `Warning: session_start(): Session cannot be started after headers`

```
<li class="dropdown">
   <a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
   <ul>
      <li><a href="#">Drop Down 1</a></li>
      <li class="dropdown">
            <a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
            <ul>
               <li><a href="#">Deep Drop Down 1</a></li>
               <li><a href="#">Deep Drop Down 2</a></li>
               <li><a href="#">Deep Drop Down 3</a></li>
               <li><a href="#">Deep Drop Down 4</a></li>
               <li><a href="#">Deep Drop Down 5</a></li>
            </ul>
      </li>
      <li><a href="#">Drop Down 2</a></li>
      <li><a href="#">Drop Down 3</a></li>
      <li><a href="#">Drop Down 4</a></li>
   </ul>
</li>
```
