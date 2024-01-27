<?php
ob_start();
// session_start();    
include('../../../components/navbar-student.php');
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
        border: 1px solid transparent;
        padding: 15px 20px;
        border-radius: 5px;
    }

    .playlist li:hover {
        border: 0.5px solid black;
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
        background: lightgreen;
        border: 0.5px solid lightgreen;
    }

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
</style>

<main id="main">

    <section class="inner-page mt-5">
        <div class="container" style="max-width: 1850px;">
            <!-- Boxes -->
            <div>

                <section>
                    <div class="containers">
                        <div id="video_player">
                            <iframe controls id="main-Video" src="" frameborder="0"></iframe>

                        </div>
                        <div class="playlistBx">
                            <div class="header">
                                <div class="row">
                                    <span class="AllLessons"></span>
                                </div>
                            </div>
                            <ul class="playlist" id="playlist">
                            </ul>
                        </div>
                    </div>
                    <div class="container mt-4" style="max-width: 100%;">
                        <h2 class="title"></h2>
                        <div class="row mt-3">
                            <div class="col-md-12 mb-3">
                                <h2 class="fw-bold">About this course</h2>
                                <span class="mt-3">Learn routing protocols from scratch and learn how to configure and use Open Shortest Path First (OSPF) effectively</span>
                            </div>
                            <hr>
                            <div class="col-md-2 mb-3">
                                <h4 class="fw-bold">Description</h4>
                            </div>
                            <div class="col-md-10">
                                <span class="mt-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laudantium delectus, ipsa quos tenetur non similique voluptatem officia quibusdam assumenda officiis, cumque, soluta possimus earum eum. Accusamus porro accusantium fuga. Possimus distinctio libero iste porro, veritatis laboriosam numquam ducimus corporis officiis dolores suscipit similique sed quidem molestiae a eum necessitatibus. Consequuntur alias eius vitae veritatis repellendus, corrupti sint enim saepe natus. Repellat maiores labore impedit temporibus cupiditate. Ea veniam magni quos est beatae esse voluptate molestiae, aliquid corrupti? Corrupti laborum molestiae magnam fuga ratione nihil a, dignissimos voluptatem totam necessitatibus eaque repudiandae delectus quae ipsa soluta vitae aut? Blanditiis, eaque adipisci!</span>
                            </div>
                            <hr>
                            <div class="col-md-2 mb-3">
                                <h4 class="fw-bold">Instructor</h4>
                            </div>
                            <div class="col-md-10">
                                <div class="d-flex align-items-center">
                                    <img src="../../../uploads/default-user-male.svg" style="height: 100px; width: 100px;">
                                    <div class="ms-3 fs-4">
                                        <span class="d-flex">User Full Name</span>
                                        <span>User Bio</span>
                                    </div>
                                </div>
                                <div class="mt-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quo accusantium minima necessitatibus ea minus error perspiciatis nesciunt, veniam blanditiis magnam tempora ullam soluta suscipit id architecto vitae quis nihil voluptatem.</div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->

<?php include('../../../components/footer.php'); ?>

<script src="./video-list.js"></script>
<script src="./script.js"></script>