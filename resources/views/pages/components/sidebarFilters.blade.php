<form method="GET" action="{{ route('filter.products') }}">
    <div class="filters">
        <div class="u-margin-bottom-small">
            <p class="filters__title">Filter by</p>
        </div>
        <ul class="filters__list">
            {{-- CATEGORY --}}
            <li class="filters__item u-margin-bottom-medium">
                <div class="menu-item" id="category">Category <span><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                                         height="1em" viewBox="0 0 32 32"><path
                                fill="currentColor" d="M16 22L6 12l1.4-1.4l8.6 8.6l8.6-8.6L26 12z"/></svg></span></div>
                <div class="checkboxes" id="checkboxes-category">
                    <label><input type="checkbox" name="category[]" value="beans"> Coffee Beans</label><br>
                    <label><input type="checkbox" name="category[]" value="pods"> Pods</label><br>
                    <label><input type="checkbox" name="category[]" value="machines"> Machines</label><br>
                    <label><input type="checkbox" name="category[]" value="accessories"> Accessories</label>
                </div>
            </li>

            {{-- COFFEE TYPE --}}
            <li class="filters__item u-margin-bottom-medium">
                <div class="menu-item" id="coffee_type">Coffee Type <span><svg xmlns="http://www.w3.org/2000/svg"
                                                                               width="1em"
                                                                               height="1em" viewBox="0 0 32 32"><path
                                fill="currentColor" d="M16 22L6 12l1.4-1.4l8.6 8.6l8.6-8.6L26 12z"/></svg></span></div>
                <div class="checkboxes" id="checkboxes-coffee-type">
                    <label><input type="checkbox" name="coffee_type[]" value="specialty"> Specialty</label><br>
                    <label><input type="checkbox" name="coffee_type[]" value="blend"> Blend</label><br>
                </div>
            </li>

            {{-- PODS --}}
            <li class="filters__item u-margin-bottom-medium">
                <div class="menu-item" id="variety">Pod Variety <span><svg xmlns="http://www.w3.org/2000/svg"
                                                                           width="1em"
                                                                           height="1em" viewBox="0 0 32 32"><path
                                fill="currentColor" d="M16 22L6 12l1.4-1.4l8.6 8.6l8.6-8.6L26 12z"/></svg></span></div>
                <div class="checkboxes" id="checkboxes-variety">
                    <label><input type="checkbox" name="variety[]" value="espresso"> Espresso</label><br>
                    <label><input type="checkbox" name="variety[]" value="long_black"> Long Black</label><br>
                    <label><input type="checkbox" name="variety[]" value="white"> White</label><br>
                </div>
            </li>

            {{-- CAFFEINE --}}
            <li class="filters__item">
                <div class="menu-item" id="caffeine">Caffeine <span><svg xmlns="http://www.w3.org/2000/svg"
                                                                         width="1em"
                                                                         height="1em" viewBox="0 0 32 32"><path
                                fill="currentColor" d="M16 22L6 12l1.4-1.4l8.6 8.6l8.6-8.6L26 12z"/></svg></span></div>
                <div class="checkboxes" id="checkboxes-caffeine">
                    <label><input type="checkbox" name="caffeine[]" value="caffeinated"> Caffeinated</label><br>
                    <label><input type="checkbox" name="caffeine[]" value="decaffeinated"> Decaffeinated</label><br>
                </div>
            </li>
        </ul>
        <button type="submit">Filter</button>
    </div>
</form>
