<?php if(base_url()=="http://www.booksmart.ga"){$siteurl="http://www.booksmart.ga:8888/index.php";
}else{
$siteurl="http://localhost:8888/index.php";
}?>
<form method="post" action="<?php echo $siteurl.'/sell/addBook/'?>">


            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="" id="title" placeholder="Title">


            <label for="author">Author</label>
            <input type="text" class="form-control" name="author" value="" id="author" placeholder="Author">


            <label for="subject">Subject</label>
            <input type="text" class="form-control" name="subject" value="" id="subject" placeholder="Subject">


            <label for="price">Price</label>
            <input type="float" class="form-control" name="price" value="" id="price" placeholder="Price">


            <label for="code">Course Code</label>
            <input type="text" class="form-control" name="coursecode" value="" id="coursecode" placeholder="Course Code">


            <label for="domain">Please select a Domain</label>
            <select name="domain" id="domain" class="form-control">
                <?php

                $domain = $this->db->get('Domain');
                foreach ($domain->result() as $row){
                    echo " <option value=\"".$row->name."\">";

                    echo $row->name;
                    echo "</option>";
                }?>
            </select>

            <label for="coursename">Course Name</label>
            <select name="coursename" id="coursename" class="form-control">
                <?php

                $domain = $this->db->get('Course');
                foreach ($domain->result() as $row){
                    echo " <option value=\"".$row->name."\">";
                    echo $row->name;
                    echo "</option>";
                }?>
            </select>

            <label for="university">University</label>
                <select name="university" id="university" class="form-control">
                    <?php

                    $domain = $this->db->get('Course');
                    foreach ($domain->result() as $row){
                        echo " <option value=\"".$row->college."\">";
                        echo $row->college;
                        echo "</option>";
                    }?>
                </select>

            <label for = "selectCondition">Select the Condition of the Book</label> <button type="button" class="btn btn-default btn-xs">
            <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
            </button>

            <select name="condition" id="condition" class="form-control">
                <option value="mint">Mint</option>
                <option value="very good">Very Good</option>
                <option value="good">Good</option>
                <option value="fair">Fair</option>
                <option value="poor" selected="true">Poor</option>
            </select>

            <br>
            <label for="exampleInputFile">Upload Photo</label>
            <input type="file" id="exampleInputFile">
            <p class="help-block">Upload photos to assure the buyer your book is in good condition</p>



        <button type="submit" class="btn btn-default">Submit</button>

    </form>
