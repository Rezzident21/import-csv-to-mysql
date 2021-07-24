<?php

class UserController extends Controller
{

    private $pageView = "/views/user.php"; #path to view

    public function __construct()
    {
        $this->model = new UserModel();
        $this->view = new View();
    }

    public function index()
    {
        /*
         * This method updload csv file
         */
        $this->pageData['title'] = "Import users";
        $this->pageData['users'] = $this->model->getAllUsers();

        session_start();

     

            if ($_FILES) {
                $file = $_FILES['csv']['name'];
                $file = substr($file, -3);
                if ($file != 'csv') {
                    $this->pageData['errors'] = "Error! Maybe current file have wrong format";
                } else {
                    if (move_uploaded_file($_FILES['csv']['tmp_name'], $_FILES['csv']['name'])) {
                        $file = fopen($_FILES['csv']['name'], "r");
                        $row = 1;
                        $i = 0;
                        $count_updated = 0;
                        $count_deleted = 0;
                        while ($data = fgetcsv($file, 200, ";")) {
                            $i++;
                            if ($row == 1) {
                                $row++;


                            } else {


                                /* надо зробити перевірку чи є юзер в базі і перевірку чи дата помінялась, і якщо юзер є якись у бд , а у файлі немає видаляємо його*/
                                if ($this->model->getUserByID($data[0], $data)) {
                                    $this->model->updateUserDateChange($data[0], $data);
                                    $count_updated++;
                                } else {
                                    $this->model->deleteUserByID($data[0]);
                                    $count_deleted++;

                                }
                                $this->model->importFromCSV($data);
                            }
                        }
                        $this->pageData['countLoaded'] = $i - 1;
                        $this->pageData['countUpdated'] = $count_updated;
                        $this->pageData['countDeleted'] = $count_deleted;


                        fclose($file);
                    }
                }


            }
            $this->view->render($this->pageView, $this->pageData); // Print our page with other data


        }

    }

?>