@props(['event'])
<div class="relative w-full flex items-end justify-start text-left bg-cover bg-center" style="height: 450px; background-image:url({{$event->image ? asset('/uploads/event/' . $event->image): asset('/images/CR7.png')}});">
    <div class="absolute top-0  right-0 bottom-0 left-0 bg-gradient-to-b from-transparent to-gray-900">
    </div>
     
    <div class="absolute top-0 right-0 left-0 mx-3 mt-2 flex justify-between items-center">
        <a href="#" class="text-xs bg-indigo-600 text-white px-5 py-2 uppercase hover:bg-white hover:text-indigo-600 transition ease-in-out duration-500">{{$event['type_of_event']}}</a>
        <span class="ml-2"></span>
        <div class="text-white font-regular flex flex-col justify-start">
            <span class="text-3xl leading-0 font-semibold"><?php echo date('d', strtotime($event['start_date'])); ?></span>
            <span class="-mt-3"><?php echo date('M', strtotime($event['start_date'])); ?></span>
        </div>
    </div>

    <main class="p-5 z-10">
        <a href="#"
           class="text-md tracking-tight font-medium leading-7 font-regular text-white hover:underline">{{$event['name']}}
        </a>
        <br>
        <a href="#"
           class="text-md tracking-tight font-medium leading-7 font-regular text-white hover:underline">{{$event['location']}} 
        </a>
    </main>

</div>
