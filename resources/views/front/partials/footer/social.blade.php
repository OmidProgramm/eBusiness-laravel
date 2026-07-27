<div class="footer-item">
        <h3>Quick Links</h3>

        <ul>
            <li><a href="#">{{$social->facebook}}</a></li>
            <li><a href="#">{{$social->instagram}}</a></li>
            <li><a href="#">{{$social->twitter}}</a></li>
            <li><a href="#">{{$social->linkedin}}</a></li>
        </ul>
    </div>

<div class="footer-bottom">
    <p>{{Str::limit($social->description,50)}}</p>
</div>