<footer class="footer">
<div class="container">
    <div class="row">
        <div class="footer-col">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/view-survey">Surveys</a></li>
                <li><a href="/feedback/show">Feedback</a></li>
            @if(Auth::check() && (Auth::user()->user_type === 'student' && (Auth::user()->level === 'L5' || Auth::user()->level === 'L6') || Auth::user()->user_type === 'staff'))
                <li><a href="/jobs/show">Career Portal</a></li>
                @endif
                <li><a href="/events">Events</a>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h4>Affiliated Universities</h4>
            <ul>
                <li><a href="#">Staffordshire University</a></li>
                <li><a href="#">Deakin University</a></li>
                <li><a href="#">Asian Institute of Technology</a></li>
                <li><a href="#">NCUK</a></li>
                <li><a href="#">ICAEW</a></li>
                <li><a href="#">Southern Cross University</a></li>
                <li><a href="#">Western Sydney University</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h4>Schools</h4>
            <ul>
                <li><a href="#">IT School</a></li>
                <li><a href="#">Business School</a></li>
                <li><a href="#">Law School</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h4>follow us</h4>
            <div class="social-links">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </div>
</div>
</footer>
