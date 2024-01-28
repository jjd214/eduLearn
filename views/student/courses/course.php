<?php
ob_start();
// session_start();    
include('../../../components/navbar-student.php');
?>

<?php
$course = getCourse($_GET['course']);
$videos = view_course_details($_GET['course']);
$instructor = get_instructor($course['instructor_id']);
$play_first_video = get_first_video($_GET['course']);
$length = get_video_length($_GET['course']);
?>


<style>
    .bg-primary {
        background-color: var(--chelsea-200) !important;
    }



    /* Bootstrap */
    ul {
        padding-left: 0rem !important;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body::-webkit-scrollbar {
        width: 10px;
    }

    body::-webkit-scrollbar-thumb {
        height: 80px;
        background: #375666;
        border: 8px solid transparent;
        border-radius: 12px;
    }

    body::-webkit-scrollbar-thumb:active {
        background: #003349;
    }

    section {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        padding: 2.5%;
    }

    .title {
        font-size: 20px;
        font-weight: 600;
        color: black;
        text-align: left;
        width: 100%;
        margin-bottom: 10px;
    }

    .containers {
        position: relative;
        width: 100%;
        height: 100%;
        display: grid;
        grid-template-columns: 2fr 1fr;
        overflow: hidden;
    }

    .containers #main-Video {
        position: relative;
        width: 100%;
        height: 470px;
        overflow: hidden;
        outline: none;
    }

    .playlistBx {
        position: relative;
        height: 100%;
        margin: 0 10px 0 10px;
    }

    .playlist {
        position: absolute;
        width: 100%;
        height: calc(100% - 40px);
        overflow-y: scroll;
        border-top: 1px solid black;
    }

    .playlist::-webkit-scrollbar {
        width: 0px;
    }

    .playlistBx .row .AllLessons {
        display: block;
        text-align: left;
        color: black;
        font-size: 15px;
        font-weight: 700;
        margin-left: 40px;
        line-height: 40px;

    }

    .playlist li {
        display: flex;
        justify-content: space-between;
        align-items: center;
        list-style: none;
        cursor: pointer;

        padding: 15px 20px;
        border-radius: 5px;
    }

    .playlist li:hover {
        border: 0.5px solid var(--chelsea-200);
    }

    .playlist li .row span {
        font-size: 15px;
        font-weight: 400;
        color: black;
        text-decoration: none;
        display: inline-block;
        text-align: left;
    }

    .playlist li .row span::before {
        content: '\f01d';
        font-family: FontAwesome;
        color: Black;
        margin-right: 15px;
        font-size: 20px;
    }

    ul li.playing .row span::before {
        content: '\f28c';
        font-family: FontAwesome;
        color: Black;
        margin-right: 15px;
        font-size: 20px;
    }

    .playlist li.playing .row span {
        color: Black;
    }

    .playlist li span.duration {
        font-size: 15px;
        font-weight: 400;
        display: inline-block;
        color: red;
        text-align: right;
    }

    .playlist li.playing {
        pointer-events: none;
        background: #1d3541;
        border: 0.5px solid #1d3541;
    }

    .containers #main-Video {
        position: relative;
        width: 100%;
        height: 470px;
        overflow: hidden;
        outline: none;
        margin: 0;
        padding: 0;
    }

    .containers #video_player {
        width: 100%;
        margin: 0;
        padding: 0;

    }

    #main-video {
        width: 100%;
        height: 100%;
        border: 1px solid #E1E1E1;
    }

    /* ... Other styles ... */


    @media(max-width: 1092px) {
        section {
            padding: 30px 10px;
        }

        .containers {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            overflow: hidden;
        }

        .containers #main-Video {
            height: 400px;
        }

        .playlistBx {
            height: 380px;
            margin-top: 10px;
        }

        .playlist {
            position: absolute;
            width: 100%;
            height: calc(100% - 40px);
            overflow-y: scroll;
        }
    }

    @media(max-width: 650px) {
        #main-Video {
            height: 300px !important;
        }
    }

    @media(max-width: 500px) {
        #main-Video {
            height: 280px !important;
        }
    }

    @media(max-width: 400px) {
        #main-Video {
            height: 250px !important;
        }
    }

    @media (max-width: 576px) {
        .inner-page {
            border-radius: 0;
        }
    }
</style>

<main id="main">

    <section class="inner-page mt-5">
        <div class="container" style="max-width: 1850px;">
            <!-- Boxes -->
            <div>

                <section>
                    <div class="containers">
                        <div id="video_player">
                            <video id="main-video" src="/eduLearn/views/instructor/dashboard/videos/<?= $play_first_video['video'] ?>" controls poster="/eduLearn/views/instructor/dashboard/videos/thumbnails/<?= $play_first_video['thumbnail'] ?>"></video>
                        </div>
                        <div class="playlistBx">
                            <div class="header">
                                <div class="row">
                                    <span class="AllLessons">Lessons <?= $length ?></span>
                                </div>
                            </div>
                            <ul class="playlist" id="playlist">
                                <?php $number = 0; ?>
                                <?php foreach ($videos as $playlist) : ?>
                                    <?php $number += 1; ?>
                                    <?php $video_data = get_video($playlist['id']); ?>
                                    <?php $description_data = get_video_description($playlist['id']) ?>
                                    <li>
                                        <a data-id="<?= $playlist['id'] ?>" data-video="<?= $video_data['video'] ?>" data-description="<?= $description_data['description'] ?>" data-thumbnail="<?= $video_data['thumbnail'] ?>"><?php echo $number . ". " ?> <?= $playlist['video_title'] ?></a>
                                    </li>

                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="container mt-4" style="max-width: 100%;">
                        <h2 class="title"></h2>
                        <div class="row mt-3">
                            <div class="col-md-12 mb-3">
                                <h2 class="fw-bold">About this course</h2>
                                <span class="mt-3"><?= $course['description'] ?></span>
                            </div>
                            <hr>
                            <div class="col-md-2 mb-3">
                                <h4 class="fw-bold">Description</h4>
                            </div>
                            <div class="col-md-10">
                                <span class="desc mt-3"><?= $play_first_video['description'] ?></span>
                            </div>
                            <hr>
                            <div class="col-md-2 mb-3">
                                <h4 class="fw-bold">Instructor</h4>
                            </div>
                            <div class="col-md-10">
                                <div class="d-flex align-items-center">
                                    <img src="../../../uploads/<?= $instructor['profile'] ?>" style="height: 100px; width: 100px; border-radius: 50%;">
                                    <div class="ms-3 fs-4">
                                        <span class="d-flex"><?= $instructor['firstname'] . " " . $instructor['lastname'] ?></span>
                                    </div>
                                </div>
                                <div class="mt-3"><?= $instructor['biography'] ?></div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var playlistItems = document.querySelectorAll('.playlist a');

        playlistItems.forEach(function(item) {
            item.addEventListener('click', function(event) {
                event.preventDefault();
                var video_url = "/eduLearn/views/instructor/dashboard/videos/" + this.getAttribute('data-video');
                var description_text = this.getAttribute('data-description');
                var thumbnail_url = "/eduLearn/views/instructor/dashboard/videos/thumbnails/" + this.getAttribute('data-thumbnail');

                play_video(video_url, description_text, thumbnail_url);
            });
        });

        function play_video(video_url, description_text, thumbnail_url) {
            document.getElementById("main-video").src = video_url;
            document.getElementById("main-video").poster = thumbnail_url;
            document.querySelector(".desc").innerText = description_text;
        }
    });
</script>



<?php include('../../../components/footer.php'); ?>