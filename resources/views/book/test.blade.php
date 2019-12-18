<html>
    <head>
        <style>
            .multiselect {
                /* width: 200px; */
                width: 100px;
            }

            .selectBox {
                position: relative;
            }

            .selectBox select {
                width: 100%;
                font-weight: bold;
            }

            .overSelect {
                position: absolute;
                left: 0;
                right: 0;
                top: 0;
                bottom: 0;
            }

            #checkboxes {
                display: none;
                border: 1px #dadada solid;
            }

            #checkboxes label {
                display: block;
            }

            #checkboxes label:hover {
                background-color: #1e90ff;
            }
        </style>
    </head>
    
    <body>
        <form>
            <div class="multiselect">
                <div class="selectBox" onclick="showCheckboxes()">
                    <select>
                        <option>Option</option>
                    </select>
                    <div class="overSelect"></div>
                </div>
                <div id="checkboxes">
                    <label for="one">
                        <input type="checkbox" id="one" />回答済</label>
                    <label for="two">
                        <input type="checkbox" id="two" />回答済</label>
                    <label for="three">
                        <input type="checkbox" id="three" />回答済</label>
                </div>
            </div>
        </form>
    </body>

    <script>
        var expanded = false;
        document.addEventListener('DOMContentLoaded', function () {
            var checkboxes = document.getElementById("checkboxes");
            if (!expanded) {
                checkboxes.style.display = "block";
                expanded = true;
            } else {
                checkboxes.style.display = "none";
                expanded = false;
            }
        })
    </script>
</html>