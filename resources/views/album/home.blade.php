<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Site Metas -->
    <title>Apiit Blog</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="/user/images/apiit-favicon.png" type="image/x-icon" />
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="/user/css/bootstrap.css" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="/user/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/user/style.css" rel="stylesheet">

    <link href="/user/nav-bar.css" rel="stylesheet">


    <!-- Responsive styles for this template -->
    <link href="/user/css/responsive.css" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="/user/css/colors.css" rel="stylesheet">

    <!-- Version Garden CSS for this template -->
    <link href="/user/css/version/garden.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Animated footer script -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    

    <!-- Fonts and Tailwind CSS -->
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwind CSS Configuration -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        custom: {
                            bg: 'snow',
                            scrollbar: 'lightsteelblue',
                            scrollbarHover: '#000'
                        },
                        dark: {
                            bg: '#050505',
                            scrollbar: '#111',
                            scrollbarHover: '#222'
                        }
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Core JavaScript -->
    <script src="/user/js/jquery.min.js"></script>
    <script src="/user/js/tether.min.js"></script>
    <script src="/user/js/bootstrap.min.js"></script>
    <script src="/user/js/custom.js"></script>

    <!-- Custom styles and other CSS files -->
    <style>
        :root {
            --c-bg: snow;
            --c-scrollbar: lightsteelblue;
            --c-scrollbar-hover: #000;
        }

        html {
            background-color: var(--c-bg);
            height: 100vh;
            width: 100vw;
            overflow: hidden;
        }

        html.dark {
            --c-bg: #050505;
            --c-scrollbar: #111;
            --c-scrollbar-hover: #222;
        }

        body {
            height: 100%;
            overflow-y: scroll;
        }

        ::selection {
            background: #8884;
        }

        * {
            scrollbar-color: var(--c-scrollbar) var(--c-bg);
        }

        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar:horizontal {
            height: 6px;
        }

        ::-webkit-scrollbar-track, ::-webkit-scrollbar-corner {
            background: var(--c-bg);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--c-scrollbar);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--c-scrollbar-hover);
        }

        [x-cloak] { display: none; }
    </style>
</head>
<body>

    @include('user.navbar')

    @foreach($gallery as $album)
    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl md:text-6xl p-6">
        <span class="block">
            {{ $album->name }}
        </span>
    </h1>
    <section class="px-4 py-24 mx-auto max-w-7xl">
        <div x-data="{
                imageGalleryOpened: false,
                imageGalleryActiveUrl: null,
                imageGalleryImageIndex: null,
                imageGalleryOpen(event) {
                    this.imageGalleryImageIndex = event.target.dataset.index;
                    this.imageGalleryActiveUrl = event.target.src;
                    this.imageGalleryOpened = true;
                },
                imageGalleryClose() {
                    this.imageGalleryOpened = false;
                    setTimeout(() => this.imageGalleryActiveUrl = null, 300);
                },
                imageGalleryNext() {
                    if (this.imageGalleryImageIndex == this.$refs.gallery.childElementCount) {
                        this.imageGalleryImageIndex = 1;
                    } else {
                        this.imageGalleryImageIndex = parseInt(this.imageGalleryImageIndex) + 1;
                    }
                    this.imageGalleryActiveUrl = this.$refs.gallery.querySelector('[data-index=\'' + this.imageGalleryImageIndex + '\']').src;
                },
                imageGalleryPrev() {
                    if (this.imageGalleryImageIndex == 1) {
                        this.imageGalleryImageIndex = this.$refs.gallery.childElementCount;
                    } else {
                        this.imageGalleryImageIndex = parseInt(this.imageGalleryImageIndex) - 1;
                    }
                    this.imageGalleryActiveUrl = this.$refs.gallery.querySelector('[data-index=\'' + this.imageGalleryImageIndex + '\']').src;
                }
            }" @image-gallery-next.window="imageGalleryNext()" @image-gallery-prev.window="imageGalleryPrev()" @keyup.right.window="imageGalleryNext();" @keyup.left.window="imageGalleryPrev();" x-init="
                imageGalleryPhotos = $refs.gallery.querySelectorAll('img');
                for (let i = 0; i < imageGalleryPhotos.length; i++) {
                    imageGalleryPhotos[i].setAttribute('data-index', i + 1);
                }
            " class="w-full h-full select-none">
            <div class="max-w-6xl mx-auto duration-1000 delay-300 opacity-0 select-none ease animate-fade-in-view" style="translate: none; rotate: none; scale: none; opacity: 1; transform: translate(0px, 0px);">
                <ul x-ref="gallery" id="gallery" class="grid grid-cols-2 gap-5 lg:grid-cols-5">
                    @foreach(explode('|', $album->gallery) as $index => $image)
                    <li>
                        <img x-on:click="imageGalleryOpen" src="{{ $image }}" data-index="{{ $index + 1 }}" class="object-cover select-none w-full h-auto bg-gray-200 rounded cursor-zoom-in aspect-[5/6] lg:aspect-[2/3] xl:aspect-[3/4]" alt="gallery-photo">
                    </li>
                    @endforeach
                </ul>
            </div>
            <template x-teleport="body">
                <div x-show="imageGalleryOpened" x-transition:enter="transition ease-in-out duration-300" x-transition:enter-start="opacity-0" x-transition:leave="transition ease-in-in duration-300" x-transition:leave-end="opacity-0" @click="imageGalleryClose" @keydown.window.escape="imageGalleryClose" x-trap.inert.noscroll="imageGalleryOpened" class="fixed inset-0 z-[99] flex items-center justify-center bg-black bg-opacity-50 select-none cursor-zoom-out" x-cloak>
                    <div class="relative flex flex-col items-center justify-center w-11/12 xl:w-4/5 h-11/12">
                        <div @click="$event.stopPropagation(); $dispatch('image-gallery-prev')" class="absolute left-0 flex items-center justify-center text-white translate-x-10 rounded-full cursor-pointer xl:-translate-x-24 2xl:-translate-x-32 bg-white/10 w-14 h-14 hover:bg-white/20">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                            </svg>
                        </div>
                        <img x-show="imageGalleryOpened" x-transition:enter="transition ease-in-out duration-300" x-transition:enter-start="opacity-0 transform scale-50" x-transition:leave="transition ease-in-in duration-300" x-transition:leave-end="opacity-0 transform scale-50" class="object-contain object-center w-full h-full select-none cursor-zoom-out" :src="imageGalleryActiveUrl" alt="" style="display: none;">
                        <div @click="$event.stopPropagation(); $dispatch('image-gallery-next');" class="absolute right-0 flex items-center justify-center text-white -translate-x-10 rounded-full cursor-pointer xl:translate-x-24 2xl:translate-x-32 bg-white/10 w-14 h-14 hover:bg-white/20">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </div>
                        <a :href="imageGalleryActiveUrl" download class="absolute bottom-10 flex items-center justify-center px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700" @click.stop>
                            Download Photo
                        </a>
                    </div>
                </div>
            </template>
        </div>
    </section>
    @endforeach

    @include('user.footer')

    <div class="dmtop">Scroll to Top</div>

</body>
</html>
