<?php
echo '
 <div class="LiveTimeContainer">
    <div class="LiveTimeIconContainer">
        <img src="./icon/clock.png" alt="" class="iconmod">
        <button class="clockformatBtn" id="twelveHourBtn">24 hour clock</button>
    </div>
    <div class="LiveTimeCurrentContainer">
        <div id="time" class="glow"></div>
    </div>
    <div class="livedateContainer">
        <div class="livedatesectionupper">
            <span class="month"></span>,
            <span class="day"></span>,
            <span class="year"></span>
        </div>
        <div class="livedatesection">
            <ul id="days">
            <li class="sunday">Sun</li>
            <li class="monday">Mon</li>
            <li class="tuesday">Tues</li>
            <li class="wednesday">Wed</li>
            <li class="thursday">Thurs</li>
            <li class="friday">Fri</li>
            <li class="saturday">Sat</li>
            </ul>

        </div>
    </div>
</div>';