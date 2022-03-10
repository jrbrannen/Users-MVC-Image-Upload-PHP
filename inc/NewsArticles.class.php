<?php

class NewsArticles {
    // data stored in array for new article
    var $dataArray = array();
    // list of errors stored in array
    var $errors = array();
    // database connection
    var $db = null;

    function __construct(){  // magic function make db connection
        $this->db = new PDO('mysql:host=localhost;dbname=wdv441;charset=utf8', 
            'user', 'wdv441');// change this db connection
    }
    
    // store the data array to the class property (dataArray)
    function set($dataArray){
        $this->dataArray = $dataArray;
    }

    function sanitize($dataArray){
        if (!empty($dataArray['article_title'])){
            $dataArray['article_title'] = filter_var($dataArray['article_title'], FILTER_SANITIZE_STRING);
        }
        if (!empty($dataArray['article_author'])){ 
            $dataArray['article_author'] = filter_var($dataArray['article_author'], FILTER_SANITIZE_STRING);
        }
        if (!empty($dataArray['article_content'])){    
            $dataArray['article_content'] = filter_var($dataArray['article_content'], FILTER_SANITIZE_STRING); 
        }
        return $dataArray;
    }

    function load($id){

        // tracking flag to see if the data was loaded 
        $isLoaded = false;

        // load from the database with a prepared statement
        $stmt = $this->db->prepare("SELECT * FROM news_articles WHERE article_id = ?");

        // execute the statement using the id as parameter for the article we want to load
        $stmt->execute(array($id));

        // check to see if the article was sucessfully loaded
        if ($stmt->rowCount() == 1){
            // if article is loaded fetch the data as an assoc array
            $dataArray = $stmt->fetch(PDO::FETCH_ASSOC);
            // set the data to internal class property
            $this->set($dataArray);

            // set the flag to be true
            $isLoaded = true;
        }

        // return load success or failure
        return $isLoaded;
    }

    function save() {
        // flag to see if save is successful 
        $isSaved = false;

        // determine if save is an insert or an update based of on the article id
        // true condition save data from the (dataArray) property to the database
        if (empty($this->dataArray['article_id'])){
            
            // create a prepared statement to insert the data into the table
            $stmt = $this->db->prepare(
                "INSERT INTO news_articles
                    (article_title, article_content, article_author, article_date)
                VALUES (?, ?, ?, ?)");

            // execute the insert statement, passing the data into the insert
            $isSaved = $stmt->execute(array(
                    $this->dataArray['article_title'],
                    $this->dataArray['article_content'],
                    $this->dataArray['article_author'],
                    $this->dataArray['article_date'],
                    )
            );

            // if the execute returns true, then store the new id back into the data property
            // this gets the newly assigned id number and stores it into the (dataArray) property
            if ($isSaved){
                $this->dataArray['article_id'] = $this->db->lastInsertId();
            }
        }else{
            // if this is an update of an existing record, create a prepare statement using a sql update
            $stmt = $this->db->prepare(
                "UPDATE news_articles SET
                    article_title = ?,
                    article_content = ?,
                    article_author = ?,
                    article_date = ?
                WHERE article_id = ?"
            );

            // execute the update statement, passing the data into the update
            $isSaved = $stmt->execute(array(
                    $this->dataArray['article_title'],
                    $this->dataArray['article_content'],
                    $this->dataArray['article_author'],
                    $this->dataArray['article_date'],
                    $this->dataArray['article_id']
                )
            );
        }
        // return success flag
        return $isSaved;
    }

    function validate(){

        $isValid = true;

        if (empty($this->dataArray['article_title'])){
            $this->errors['article_title'] = "Title is required";
            $isValid = false;
        }
        if (empty($this->dataArray['article_author'])){
            $this->errors['article_author'] = "Author is required";
            $isValid = false;
        }
        if (empty($this->dataArray['article_content'])){
            $this->errors["article_content"] = "Content is required";
            $isValid = false;
        }
        if (empty($this->dataArray['article_date'])){
            $this->errors["article_date"] = "Date is required";
            $isValid = false;
        }
        return $isValid;
    }

    // get a list of news articles as an array    
    function getList() {
        $dataList = array();

        // load from the database with a prepared statement
        $stmt = $this->db->prepare("SELECT * FROM news_articles");

        // execute the statement
        $stmt->execute(array());
         
        // check row count and store data in an array
        if ($stmt->rowCount() > 0){
            // if article is loaded fetch the data as an assoc array
            $dataList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }       
        // return the list of articles
        return $dataList;       
    }

}

?>