<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subsoal extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("Main_model");
        $this->load->model("Other_model");
    }
    
    public function index(){
        // navbar and sidebar
        $data['menu'] = "Subsoal";

        // for title and header 
        $data['title'] = "List Sub Soal";

        // for modal 
        $data['modal'] = [
            "modal_subsoal",
            "modal_setting"
        ];
        
        // javascript 
        $data['js'] = [
            "ajax.js",
            "function.js",
            "helper.js",
            "modules/setting.js",
            "modules/subsoal.js",
            "load_data/subsoal_reload.js",
        ];

        // $this->load->view("pages/subsoal/list-soal", $data);
        $this->load->view("pages/subsoal/list", $data);
    }

    public function edit($id){
        $soal = $this->Main_model->get_one("sub_soal", ["md5(id_sub)" => $id, "hapus" => 0]);
        
        // id soal 
        $data['id'] = $id;
        $data['title'] = "List Soal " . $soal['nama_sub'];
        
        $data['menu'] = "Item";

        // for modal 
        $data['modal'] = [
            "modal_item_soal",
            "modal_setting"
        ];
        
        // javascript 
        $data['js'] = [
            "ajax.js",
            "function.js",
            "helper.js",
            "modules/setting.js",
            "modules/item_soal.js",
            // "load_data/reload_soal_listening.js",
            "load_data/item_soal_reload.js",
        ];

        // $this->load->view("pages/subsoal/list-soal", $data);
        $this->load->view("pages/subsoal/list-item", $data);
    }

    public function hasil($id){
        // navbar and sidebar
        $data['menu'] = "Soal";

        // for title and header 
        $data['title'] = "List Hasil Soal";

        $respon = $this->Main_model->get_all("peserta", ["md5(id_sub)" => $id]);
        $data['respon'] = [];
        foreach ($respon as $i => $respon) {
            $data['respon'][$i] = $respon;
            $jawaban = explode("###", $respon['text']);
            $data['respon'][$i]['text'] = $jawaban;
        }

        $this->load->view("pages/subsoal/hasil-soal", $data);
    }

    public function loadSubSoal(){
        header('Content-Type: application/json');
        $output = $this->subsoal->loadSubSoal();
        echo $output;
    }

    public function add_subsoal(){
        $data = $this->subsoal->add_subsoal();
        echo json_encode($data);
    }
    
    public function get_subsoal(){
        $data = $this->subsoal->get_subsoal();
        echo json_encode($data);
    }

    public function update_subsoal(){
        $data = $this->subsoal->update_subsoal();
        echo json_encode($data);
    }

    public function delete_subsoal(){
        $data = $this->subsoal->delete_subsoal();
        echo json_encode($data);
    }

    public function add_item_soal(){
        $data = $this->subsoal->add_item_soal();
        echo json_encode($data);
    }

    public function get_all_item_soal(){
        $data = $this->subsoal->get_all_item_soal();
        echo json_encode($data);
    }

    public function get_item_soal(){
        $data = $this->subsoal->get_item_soal();
        echo json_encode($data);
    }
    
    public function edit_item_soal(){
        $data = $this->subsoal->edit_item_soal();
        echo json_encode($data);
    }

    public function edit_urutan_soal(){
        $data = $this->subsoal->edit_urutan_soal();
        echo json_encode($data);
    }

    public function hapus_item_soal(){
        $data = $this->subsoal->hapus_item_soal();
        echo json_encode($data);
    }

    public function get_text_reading(){
        $data = $this->subsoal->get_text_reading();
        echo json_encode($data);
    }

    public function input($id){
        $this->Main_model->delete_data("item_soal", ["id_sub" => $id]);

        if($id == 1){
            $data = [
                [
                    "tipe" => "petunjuk",
                    "data" => "Pre Test"
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "1",
                        "soal" => "
                                Many modern mobile devices are ______ to use.
                        ",
                        "pilihan" => [
                            "Complication",
                            "Complicates",
                            "Complicate",
                            "Complicated",
                        ],
                        "jawaban" => "Complicated",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "2",
                        "soal" => "
                                The pipelines _______ huge quantities of natural gas
                        ",
                        "pilihan" => [
                            "Transport",
                            "Transported",
                            "Transportation",
                            "Transports",
                        ],
                        "jawaban" => "Transport",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "3",
                        "soal" => "
                                The money ________ taken away from the bank
                        ",
                        "pilihan" => [
                            "Has",
                            "Has been",
                            "Have",
                            "Have been",
                        ],
                        "jawaban" => "Has been",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "4",
                        "soal" => "
                                The competition ________ by them.
                        ",
                        "pilihan" => [
                            "Is win",
                            "Is won",
                            "Is winner",
                            "Is winning",
                        ],
                        "jawaban" => "Is won",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "5",
                        "soal" => "
                                He bought her a ______________.
                        ",
                        "pilihan" => [
                            "Red beautiful dress",
                            "Dress beautiful red",
                            "Beautiful red dress",
                            "Red dress beautiful",
                        ],
                        "jawaban" => "Beautiful red dress",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "6",
                        "soal" => "
                                Yesterday, each student _________ by the teacher
                        ",
                        "pilihan" => [
                            "Is punished",
                            "Was punished",
                            "Are punished",
                            "Were punished",
                        ],
                        "jawaban" => "Was punished",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "7",
                        "soal" => "
                                Seldom ________  this beautiful music throughout my life
                        ",
                        "pilihan" => [
                            "I have heard",
                            "Have I heard",
                            "I have been heard",
                            "Have been I heard",
                        ],
                        "jawaban" => "Have I heard",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "8",
                        "soal" => "
                                The novel _____________ by Andi will be published tomorrow
                        ",
                        "pilihan" => [
                            "write",
                            "writing",
                            "Being written",
                            "Has been wrote",
                        ],
                        "jawaban" => "Being written",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "9",
                        "soal" => "
                                The scientist have wondered _______ life exists or not elsewhere in the universe.
                        ",
                        "pilihan" => [
                            "Whether",
                            "Because",
                            "Where",
                            "As",
                        ],
                        "jawaban" => "Whether",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "10",
                        "soal" => "
                                The doctor ________ two sons stands in front of the office.
                        ",
                        "pilihan" => [
                            "Whose",
                            "Whom",
                            "Which has",
                            "Who has",
                        ],
                        "jawaban" => "Who has",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "11",
                        "soal" => "
                                The art of storytelling _________ almost as old as humanity.
                        ",
                        "pilihan" => [
                            "That is",
                            "Is",
                            "It is",
                            "Being",
                        ],
                        "jawaban" => "Is",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "12",
                        "soal" => "
                                Buffalo Bill, _____________, operated his own Wild West Show.
                        ",
                        "pilihan" => [
                            "Is a famous frontiersman",
                            "A famous frontiersman",
                            "Which is a famous frontiersman",
                        ],
                        "jawaban" => "A famous frontiersman",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "13",
                        "soal" => "
                                <u>During</u> solar storm, the <u>amount</u> of radiation <u>reaching</u> the Earth is <u>abnormal</u> high. <br>Which underlined word is not grammatically correct?
                        ",
                        "pilihan" => [
                            "During",
                            "Amount",
                            "Reaching",
                            "Abnormal",
                        ],
                        "jawaban" => "Abnormal",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "14",
                        "soal" => "
                                Many universities receive grants to _____ research for the federal government.
                        ",
                        "pilihan" => [
                            "Do",
                            "Make",
                        ],
                        "jawaban" => "Do",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "15",
                        "soal" => "
                                As <u>childs</u> grow <u>older</u>, <u>their</u> bones become <u>thicker</u> and longer.<br>Which underlined word is not grammatically correct?
                        ",
                        "pilihan" => [
                            "Childs",
                            "Older",
                            "Their",
                            "Thicker",
                        ],
                        "jawaban" => "Childs",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "16",
                        "soal" => "
                                The story of the motel business from 1920 to the start of World War II in 1941 is one of uninterrupted growth. Motels spread from the West and the Midwest all the way to Maine and Florida. There were 16.000 motels by 1930 and 24.000 by 1940. The motel industry was one of the few industries that was not hurt by the Depression of the 1930’s. Their cheap rates attracted travelers who had very little money. <br>What does the passage mainly discuss?
                        ",
                        "pilihan" => [
                            "How the Depression hurt U.S. motels",
                            "The impact of transcontinental highways",
                            "Two decades of growth for the motel industry",
                        ],
                        "jawaban" => "Two decades of growth for the motel industry",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "17",
                        "soal" => "
                                The Civil War created extremely rapid manufacturing activity to supply critical material, especially in the North. <br>Which of the following is closest in meaning with the word “critical”?
                        ",
                        "pilihan" => [
                            "Industrial",
                            "Serious",
                            "Crucial",
                            "Insulting",
                        ],
                        "jawaban" => "Crucial",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "18",
                        "soal" => "
                                Florist often refrigerate cut flowers to protect their fresh appearance. <br>The word “their” refers to..
                        ",
                        "pilihan" => [
                            "Florist’",
                            "Flowers’",
                        ],
                        "jawaban" => "Flowers’",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "19",
                        "soal" => "
                
                        ",
                        "pilihan" => [
                            " He’s a pilot",
                            " He’s a flight attendant",
                            " He’s a member of ground crew",
                            " He works clearing the land",
                        ],
                        "jawaban" => " He’s a pilot",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "20",
                        "soal" => "
                
                        ",
                        "pilihan" => [
                            " In an airplane",
                            " In a police car",
                            " In a theater",
                            " At a fireworks exhibit",
                        ],
                        "jawaban" => " In a theater",
                    ]
                ]
            ];
        } else if($id == 2){
            $data = [
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 1,
                        "soal" => "",
                        "pilihan" => [
                            "Carla does not live very far away.",
                            "What Carla said was unjust.",
                            "He does not fear what anyone says.",
                            "Carla is fairly rude to others.",
                        ],
                        "jawaban" => "What Carla said was unjust.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 2,
                        "soal" => "",
                        "pilihan" => [
                            "She thinks it's an improvement.",
                            "The fir trees in it are better.",
                            "It resembles the last one.",
                            "It is the best the man has ever done.",
                        ],
                        "jawaban" => "She thinks it's an improvement.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 3,
                        "soal" => "",
                        "pilihan" => [
                            "He graduated last in his class.",
                            "He is the last person in his family to graduate.",
                            "He doesn't believe he can improve gradually.",
                            "He has finally finished his studies.",
                        ],
                        "jawaban" => "He has finally finished his studies.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 4,
                        "soal" => "",
                        "pilihan" => [
                            "He thought the dress was so chic.",
                            "He was surprised the dress was not expensive.",
                            "He would like to know what color dress it was.",
                            "The dress was not cheap.",
                        ],
                        "jawaban" => "He was surprised the dress was not expensive.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 5,
                        "soal" => "",
                        "pilihan" => [
                            "Leave the car somewhere else.",
                            "Ignore the parking tickets.",
                            "Add more money to the meter.",
                            "Pay the parking attendant.",
                        ],
                        "jawaban" => "Add more money to the meter.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 6,
                        "soal" => "",
                        "pilihan" => [
                            "He does not like to hold too many books at one time.",
                            "There is no bookstore in his neighborhood.",
                            "It's not possible to obtain the book yet.",
                            "He needs to talk to someone at the bookstore.",
                        ],
                        "jawaban" => "It's not possible to obtain the book yet.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 7,
                        "soal" => "",
                        "pilihan" => [
                            "It was incomplete.",
                            "It finished on time.",
                            "It was about honor.",
                            "It was too long.",
                        ],
                        "jawaban" => "It was too long.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 8,
                        "soal" => "",
                        "pilihan" => [
                            "She needs to use the man's notes.",
                            "Yesterday's physics class was quite boring.",
                            "She took some very good notes in physics class.",
                            "She would like to lend the man her notes.",
                        ],
                        "jawaban" => "She needs to use the man's notes.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 9,
                        "soal" => "",
                        "pilihan" => [
                            "It's her birthday today.",
                            "She's looking for a birthday gift.",
                            "She wants to go shopping with her dad.",
                            "She wants a new wallet for herself.",
                        ],
                        "jawaban" => "She's looking for a birthday gift.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 10,
                        "soal" => "",
                        "pilihan" => [
                            "He took a quick trip.",
                            "The big boat was towed through the water.",
                            "There was coal in the water.",
                            "He didn't go for a swim.",
                        ],
                        "jawaban" => "He didn't go for a swim.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 11,
                        "soal" => "",
                        "pilihan" => [
                            "She just left her sister's house.",
                            "Her sister left the sweater behind.",
                            "She believes her sweater was left at her sister's house.",
                            "She doesn't know where her sister lives.",
                        ],
                        "jawaban" => "She believes her sweater was left at her sister's house.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 12,
                        "soal" => "",
                        "pilihan" => [
                            "She doesn't have time to complete additional reports.",
                            "She cannot finish the reports that she is already working on.",
                            "She is scared of having responsibility for the reports.",
                            "It is not time for the accounting reports to be compiled.",
                        ],
                        "jawaban" => "She doesn't have time to complete additional reports.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 13,
                        "soal" => "",
                        "pilihan" => [
                            "He's had enough exercise.",
                            "He's going to give himself a reward for the hard work.",
                            "He's going to stay on for quite some time.",
                            "He would like to give the woman an exercise machine as a gift.",
                        ],
                        "jawaban" => "He's had enough exercise.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 14,
                        "soal" => "",
                        "pilihan" => [
                            "He cannot see the huge waves.",
                            "The waves are not coming in.",
                            "He would like the woman to repeat what she said.",
                            "He agrees with the woman.",
                        ],
                        "jawaban" => "He agrees with the woman.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 15,
                        "soal" => "",
                        "pilihan" => [
                            "The exam was postponed.",
                            "The man should have studied harder.",
                            "Night is the best time to study for exams.",
                            "She is completely prepared for the exam.",
                        ],
                        "jawaban" => "The exam was postponed.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 16,
                        "soal" => "",
                        "pilihan" => [
                            "Students who want to change schedules should form a line.",
                            "It is only possible to make four changes in the schedule.",
                            "It is necessary to submit the form quickly.",
                            "Problems occur when people don't wait their tum.",
                        ],
                        "jawaban" => "It is necessary to submit the form quickly.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 17,
                        "soal" => "",
                        "pilihan" => [
                            "In a mine.",
                            "In a jewelry store.",
                            "In a clothing store.",
                            "In a bank.",
                        ],
                        "jawaban" => "In a jewelry store.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 18,
                        "soal" => "",
                        "pilihan" => [
                            "A visit to the woman's family.",
                            "The telephone bill.",
                            "The cost of a new telephone.",
                            "How far away the woman's family lives.",
                        ],
                        "jawaban" => "The telephone bill.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 19,
                        "soal" => "",
                        "pilihan" => [
                            "She hasn't met her new boss yet.",
                            "She has a good opinion of her boss.",
                            "Her boss has asked her about her impressions of the company.",
                            "Her boss has been putting a lot of pressure on her.",
                        ],
                        "jawaban" => "She has a good opinion of her boss.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 20,
                        "soal" => "",
                        "pilihan" => [
                            "The recital starts in three hours.",
                            "He intends to recite three different poems.",
                            "He received a citation on the third of the month.",
                            "He thinks the performance begins at three.",
                        ],
                        "jawaban" => "He thinks the performance begins at three.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 21,
                        "soal" => "",
                        "pilihan" => [
                            "Choose a new dentist.",
                            "Cure the pain himself.",
                            "Make an appointment with his dentist.",
                            "Ask his dentist about the right way to brush.",
                        ],
                        "jawaban" => "Make an appointment with his dentist.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 22,
                        "soal" => "",
                        "pilihan" => [
                            "It is almost five o'clock.",
                            "The man doesn't really need the stamps.",
                            "It is a long way to the post office.",
                            "It would be better to go after five o'clock.",
                        ],
                        "jawaban" => "It is almost five o'clock.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 23,
                        "soal" => "",
                        "pilihan" => [
                            "The article was placed on reserve.",
                            "The woman must ask the professor for a copy.",
                            "The woman should lock through a number of journals in the library.",
                            "He has reservations about the information in the article.",
                        ],
                        "jawaban" => "The article was placed on reserve.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 24,
                        "soal" => "",
                        "pilihan" => [
                            "He needs to take a nap.",
                            "He hopes the woman will help him to calm down.",
                            "The woman just woke him up.",
                            "He is extremely relaxed.",
                        ],
                        "jawaban" => "He is extremely relaxed.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 25,
                        "soal" => "",
                        "pilihan" => [
                            "She doesn't think the news report is false.",
                            "She has never before reported on the news.",
                            "She never watches the news on television.",
                            "She shares the man's opinion about the report.",
                        ],
                        "jawaban" => "She shares the man's opinion about the report.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 26,
                        "soal" => "",
                        "pilihan" => [
                            "Management will offer pay raises on Friday.",
                            "The policy has not yet been decided.",
                            "The manager is full of hot air.",
                            "The plane has not yet landed.",
                        ],
                        "jawaban" => "The policy has not yet been decided.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 27,
                        "soal" => "",
                        "pilihan" => [
                            "He doesn't believe that it is really snowing.",
                            "The snow had been predicted.",
                            "The exact amount of snow is unclear.",
                            "He expected the woman to go out in the snow.",
                        ],
                        "jawaban" => "The snow had been predicted.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 28,
                        "soal" => "",
                        "pilihan" => [
                            "She's going to take the test over again'.",
                            "She thinks she did a good job on the exam.",
                            "She has not yet taken the literature exam.",
                            "She's unhappy with how she did.",
                        ],
                        "jawaban" => "She's unhappy with how she did.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 29,
                        "soal" => "",
                        "pilihan" => [
                            "The door was unlocked.",
                            "It was better to wait outside.",
                            "He could not open the door.",
                            "He needed to take a walk.",
                        ],
                        "jawaban" => "He could not open the door.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 30,
                        "soal" => "",
                        "pilihan" => [
                            "He nailed the door shut.",
                            "He is heading home.",
                            "He hit himself in the head.",
                            "He is absolutely correct.",
                        ],
                        "jawaban" => "He is absolutely correct.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 31,
                        "soal" => "",
                        "pilihan" => [
                            "The haircut is unusually short.",
                            "This is Bob's first haircut.",
                            "Bob doesn't know who gave him the haircut.",
                            "After the haircut, Bob's hair still touches the floor.",
                        ],
                        "jawaban" => "The haircut is unusually short.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 32,
                        "soal" => "",
                        "pilihan" => [
                            "It is just what he wanted.",
                            "He enjoys having the latest style.",
                            "He dislikes it immensely.",
                            "He thinks it will be cool in the summer.",
                        ],
                        "jawaban" => "He dislikes it immensely.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 33,
                        "soal" => "",
                        "pilihan" => [
                            "A broken mirror.",
                            "The hairstylist.",
                            "The scissors used to cut his hair.",
                            "piles of his hair.",
                        ],
                        "jawaban" => "piles of his hair.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 34,
                        "soal" => "",
                        "pilihan" => [
                            "“You should become a hairstylist&quot;",
                            "&quot;Please put it back on.&quot;",
                            "&quot;It'll grow back.&quot;",
                            "&quot;It won't grow fast enough&quot;",
                        ],
                        "jawaban" => "&quot;It'll grow back.&quot;",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 35,
                        "soal" => "",
                        "pilihan" => [
                            "Every evening.",
                            "Every week.",
                            "Every Sunday.",
                            "Every month.",
                        ],
                        "jawaban" => "Every week.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 36,
                        "soal" => "",
                        "pilihan" => [
                            "That she was eighty-five years old.",
                            "That a storm was coming.",
                            "That she was under a great deal of pressure.",
                            "That she wanted to become a weather forecaster.",
                        ],
                        "jawaban" => "That a storm was coming.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 37,
                        "soal" => "",
                        "pilihan" => [
                            "In her bones.",
                            "In her ears.",
                            "In her legs.",
                            "In her head.",
                        ],
                        "jawaban" => "In her bones.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 38,
                        "soal" => "",
                        "pilihan" => [
                            "Call his great-grandmother less often.",
                            "Watch the weather forecasts with his great-grandmother.",
                            "Help his great-grandmother relieve some of her pressures.",
                            "Believe his great-grandmother's predictions about the weather.",
                        ],
                        "jawaban" => "Believe his great-grandmother's predictions about the weather.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 39,
                        "soal" => "",
                        "pilihan" => [
                            "In a car.",
                            "On a hike.",
                            "On a tram.",
                            "In a lecture hall.",
                        ],
                        "jawaban" => "On a tram.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 40,
                        "soal" => "",
                        "pilihan" => [
                            "It means they have big tears.",
                            "It means they like to swim.",
                            "It means they look like crocodiles.",
                            "It means they are pretending to be sad.",
                        ],
                        "jawaban" => "It means they are pretending to be sad.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 41,
                        "soal" => "",
                        "pilihan" => [
                            "They are sad.",
                            "They are warming themselves.",
                            "They are getting rid of salt.",
                            "They regret their actions.",
                        ],
                        "jawaban" => "They are getting rid of salt.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 42,
                        "soal" => "",
                        "pilihan" => [
                            "Taking photographs.",
                            "Getting closer to the crocodiles.",
                            "Exploring the water's edge.",
                            "Getting off the tram.",
                        ],
                        "jawaban" => "Taking photographs.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 43,
                        "soal" => "",
                        "pilihan" => [
                            "Water Sports.",
                            "Physics.",
                            "American History.",
                            "Psychology.",
                        ],
                        "jawaban" => "American History.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 44,
                        "soal" => "",
                        "pilihan" => [
                            "To cut.",
                            "To move fast.",
                            "To steer a boat.",
                            "To build a ship.",
                        ],
                        "jawaban" => "To move fast.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 45,
                        "soal" => "",
                        "pilihan" => [
                            "To bring tea from China.",
                            "To transport gold to California.",
                            "To trade with the British.",
                            "To sail the American river system.",
                        ],
                        "jawaban" => "To bring tea from China.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 46,
                        "soal" => "",
                        "pilihan" => [
                            "A reading assignment.",
                            "A quiz on Friday.",
                            "A research paper for the end of the semester.",
                            "Some written homework.",
                        ],
                        "jawaban" => "Some written homework.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 47,
                        "soal" => "",
                        "pilihan" => [
                            "Writers.",
                            "Actors.",
                            "Athletes.",
                            "Musicians.",
                        ],
                        "jawaban" => "Writers.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 48,
                        "soal" => "",
                        "pilihan" => [
                            "He or she would see butterflies.",
                            "He or she would break a leg.",
                            "He or she would have shaky knees.",
                            "He or she would stop breathing.",
                        ],
                        "jawaban" => "He or she would have shaky knees.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 49,
                        "soal" => "",
                        "pilihan" => [
                            "By staring at the audience.",
                            "By breathing shallowly.",
                            "By thinking about possible negative outcomes.",
                            "By focusing on what needs to be done.",
                        ],
                        "jawaban" => "By focusing on what needs to be done.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 50,
                        "soal" => "",
                        "pilihan" => [
                            "At two o'clock.",
                            "At four o'clock.",
                            "At six o'clock.",
                            "At eight o'clock.",
                        ],
                        "jawaban" => "At six o'clock.",
                    ]
                ]
            ];
        } else if($id == 3){
            $data = [
                [
                    "tipe" => "petunjuk",
                    "data" => "Structure"
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 1,
                        "soal" => "_____ range in color from pale yellow to bright orange.",
                        "pilihan" => [
                            "Canaries which",
                            "Canaries",
                            "That canaries",
                            "Canaries that are",
                        ],
                        "jawaban" => "Canaries",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 2,
                        "soal" => "_______ of precious gems is determined by their hardness, color, and brilliance.",
                        "pilihan" => [
                            "The valuable",
                            "It is the value",
                            "It is valuable",
                            "The value",
                        ],
                        "jawaban" => "The value",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 3,
                        "soal" => "______ a tornado spins in a counterclockwise direction in the northern hemisphere, it spins in the opposite direction in the southern hemisphere.",
                        "pilihan" => [
                            "However",
                            "Because of",
                            "Although",
                            "That",
                        ],
                        "jawaban" => "Although",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 4,
                        "soal" => "The Caldecott Medal, _________ for the best children's picture book, is awarded each January.",
                        "pilihan" => [
                            "a prize",
                            "which prize",
                            "is a prize which",
                            "is a prize",
                        ],
                        "jawaban" => "a prize",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 5,
                        "soal" => "The horn of the rhinoceros consists of a cone of tight bundles of keratin __________ from the epidermis.",
                        "pilihan" => [
                            "grow",
                            "grows",
                            "growing",
                            "they grow",
                        ],
                        "jawaban" => "growing",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 6,
                        "soal" => "Most species of heliotropes are weeds, _________of them are cultivated.",
                        "pilihan" => [
                            "some",
                            "but some",
                            "for some species",
                            "some species",
                        ],
                        "jawaban" => "but some",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 7,
                        "soal" => "Thunder occurs as _______ through air, causing the heated air to expand and collide with layers of cooler air.",
                        "pilihan" => [
                            "an electrical charge",
                            "passes an electrical charge",
                            "the passing of an electrical charge",
                            "an electrical charge passes",
                        ],
                        "jawaban" => "an electrical charge passes",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 8,
                        "soal" => "Researchers have long debated _________ Saturn's moon Titan contains hydrocarbon oceans and lakes.",
                        "pilihan" => [
                            "over it",
                            "whether it",
                            "whether",
                            "whether over",
                        ],
                        "jawaban" => "whether",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 9,
                        "soal" => "Nimbostratus clouds are thick, dark grey clouds _______forebode rain.",
                        "pilihan" => [
                            "what",
                            "which",
                            "what they",
                            "which they",
                        ],
                        "jawaban" => "which",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 10,
                        "soal" => "_________ in several early civilizations, a cubit was based on the length of the forearm from the tip of the middle finger to the elbow.",
                        "pilihan" => [
                            "It was used as a measurement",
                            "A measurement was used",
                            "The use of a measurement",
                            "Used as a measurement",
                        ],
                        "jawaban" => "Used as a measurement",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 11,
                        "soal" => "Only when air and water seep through its outer coat _________.",
                        "pilihan" => [
                            "does a seed germinate",
                            "to the germination of a seed",
                            "a seed germinates",
                            "for a seed to germinate",
                        ],
                        "jawaban" => "does a seed germinate",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 12,
                        "soal" => "_________ seasonal rainfall, especially in regions near the tropics, is winds that blow in an opposite direction in winter than in summer.",
                        "pilihan" => [
                            "Causing",
                            "That cause",
                            "To cause",
                            "What causes",
                        ],
                        "jawaban" => "What causes",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 13,
                        "soal" => "The extinct Martian volcano Olympus Mons is approximately three times as _________ Mount Everest.",
                        "pilihan" => [
                            "high",
                            "high as is",
                            "higher than",
                            "the highest of",
                        ],
                        "jawaban" => "high as is",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 14,
                        "soal" => "The flight instructor, __________ at the air base, said that orders not to fight had been given.",
                        "pilihan" => [
                            "when interviewed",
                            "when he interviewed",
                            "when his interview",
                            "when interviewing",
                        ],
                        "jawaban" => "when interviewed",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 15,
                        "soal" => "In the northern and central parts of the state of Idaho _______ and churning rivers.",
                        "pilihan" => [
                            "majestic mountains are found",
                            "found majestic mountains",
                            "are found majestic mountains",
                            "finding majestic mountains",
                        ],
                        "jawaban" => "are found majestic mountains",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 16,
                        "soal" => "<u>Light</u> can <u>travels</u> from the Sun to the Earth <u>in</u> eight minutes and twenty <u>seconds</u>.",
                        "pilihan" => [
                            "Light",
                            "travels",
                            "in",
                            "seconds",
                        ],
                        "jawaban" => "travels",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 17,
                        "soal" => "Every human <u>typically</u> <u>have</u> twenty-three pairs of chromosomes in <u>most</u> <u>cells</u>.",
                        "pilihan" => [
                            "typically",
                            "have",
                            "most",
                            "cells",
                        ],
                        "jawaban" => "have",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 18,
                        "soal" => "<u>Most</u> sedimentary rocks <u>start forming</u> when grains of clay, silt, or <u>sandy</u> settle in river valleys <u>or on</u> the bottoms of lakes and oceans.",
                        "pilihan" => [
                            "Most",
                            "start forming",
                            "sandy",
                            "or on",
                        ],
                        "jawaban" => "sandy",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 19,
                        "soal" => "The total thickness of the ventricular <u>walls</u> of the heart <u>are</u> <u>about</u> three times <u>that</u> of the atria.",
                        "pilihan" => [
                            "walls",
                            "are",
                            "about",
                            "that",
                        ],
                        "jawaban" => "are",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 20,
                        "soal" => "The type of jazz <u>known</u> as &quot;swing&quot; <u>was introduced</u> by Duke Ellington when <u>he</u> wrote and <u>records</u> &quot;<b>It Don't Mean a Thing If It Ain't Got That Swing</b>.&quot;",
                        "pilihan" => [
                            "known",
                            "was introduced",
                            "he",
                            "records",
                        ],
                        "jawaban" => "records",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 21,
                        "soal" => "The bones of mammals, not <u>alike</u> <u>those</u> of <u>other</u> vertebrates, show a high degree of <u>differentiation</u>.",
                        "pilihan" => [
                            "alike",
                            "those",
                            "other",
                            "differentiation",
                        ],
                        "jawaban" => "alike",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 22,
                        "soal" => "<u>The</u> neocortex has <u>evolved</u> more recently <u>then</u> <u>other</u> layers of the brain.",
                        "pilihan" => [
                            "The",
                            "evolved",
                            "then",
                            "other",
                        ],
                        "jawaban" => "then",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 23,
                        "soal" => "The United States <u>receives</u> a large <u>amount</u> of revenue from <u>taxation</u> <u>of a</u> tobacco products.",
                        "pilihan" => [
                            "receives",
                            "amount",
                            "taxation",
                            "of a",
                        ],
                        "jawaban" => "of a",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 24,
                        "soal" => "<u>Much</u> fats are composed of one molecule of glycerin <u>combined with</u> three molecules of <u>fatty</u> <u>acids</u>.",
                        "pilihan" => [
                            "Much",
                            "combined with",
                            "fatty",
                            "acids",
                        ],
                        "jawaban" => "Much",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 25,
                        "soal" => "The <u>capital</u> of the Confederacy was <u>originally</u> in Mobile, but <u>they were</u> <u>moved</u> to Richmond.",
                        "pilihan" => [
                            "capital",
                            "originally",
                            "they were",
                            "moved",
                        ],
                        "jawaban" => "they were",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 26,
                        "soal" => "A pearl develops <u>when</u> a tiny grain of sand or stone or some <u>another</u> <u>irritant</u> accidentally <u>enters into</u> the shell of a pearl oyster.",
                        "pilihan" => [
                            "when",
                            "another",
                            "irritant",
                            "enters into",
                        ],
                        "jawaban" => "another",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 27,
                        "soal" => "The English horn is <u>an alto</u> oboe with a <u>pitch</u> one-fifth lower <u>than</u> <u>the</u> soprano oboe.",
                        "pilihan" => [
                            "an alto",
                            "pitch",
                            "than",
                            "the",
                        ],
                        "jawaban" => "the",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 28,
                        "soal" => "In the Milky Way galaxy. the <u>most</u> <u>recent</u> observed supernova <u>appeared</u> <u>in</u> 1604.",
                        "pilihan" => [
                            "most",
                            "recent",
                            "appeared",
                            "in",
                        ],
                        "jawaban" => "recent",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 29,
                        "soal" => "Never in the history of <u>humanity</u> <u>has</u> there been more people <u>living</u> on this <u>relatively</u> small planet.",
                        "pilihan" => [
                            "humanity",
                            "has",
                            "living",
                            "relatively",
                        ],
                        "jawaban" => "has",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 30,
                        "soal" => "Because of the <u>mobility</u> of Americans today, it is <u>difficult</u> for <u>they</u> to put down <u>real roots</u>.",
                        "pilihan" => [
                            "mobility",
                            "difficult",
                            "they",
                            "real roots",
                        ],
                        "jawaban" => "they",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 31,
                        "soal" => "<u>For</u> five years after the Civil War, Robert E. Lee served <u>to</u> president of Washington College, <u>which</u> was <u>later</u> called Washington and Lee.",
                        "pilihan" => [
                            "For",
                            "to",
                            "which",
                            "later",
                        ],
                        "jawaban" => "to",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 32,
                        "soal" => "The <u>number</u> of wild horses on Assateague <u>is</u> increasing lately, <u>resulting</u> in overgrazed marsh and dune <u>grasses</u>.",
                        "pilihan" => [
                            "number",
                            "is",
                            "resulting",
                            "grasses",
                        ],
                        "jawaban" => "is",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 33,
                        "soal" => "<u>Hypnoses</u> was <u>successfully</u> used <u>during</u> World War II to treat <u>battle fatigue</u>.",
                        "pilihan" => [
                            "Hypnoses",
                            "successfully",
                            "during",
                            "battle fatigue",
                        ],
                        "jawaban" => "Hypnoses",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 34,
                        "soal" => "The lobster, <u>like</u> <u>many</u> crustaceans, can cast off a <u>damaging</u> appendage and regenerate a new appendage to nearly <u>normal</u> size.",
                        "pilihan" => [
                            "like",
                            "many",
                            "damaging",
                            "normal",
                        ],
                        "jawaban" => "damaging",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 35,
                        "soal" => "Humans <u>develop normally</u> twenty <u>primary</u>, <u>or</u> deciduous, teeth and thirty-two <u>permanent</u> ones.",
                        "pilihan" => [
                            "develop normally",
                            "primary",
                            "or",
                            "permanent",
                        ],
                        "jawaban" => "develop normally",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 36,
                        "soal" => "<u>The</u> curricula of American public schools <u>are</u> set in individual states; they <u>do not determine</u> by the <u>federal</u> government.",
                        "pilihan" => [
                            "The",
                            "are",
                            "do not determine",
                            "federal",
                        ],
                        "jawaban" => "do not determine",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 37,
                        "soal" => "The fact that the sophisticated technology <u>has become</u> part of <u>revolution</u> in travel <u>delivery</u> systems has not made travel schedules <u>less</u> hectic.",
                        "pilihan" => [
                            "has become",
                            "revolution",
                            "delivery",
                            "less",
                        ],
                        "jawaban" => "revolution",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 38,
                        "soal" => "Balanchine's <u>plotless</u> ballets, <u>such</u> Jewels and The Four Temperaments, <u>present</u> dance <u>purely</u> as a celebration of the movement of the human body.",
                        "pilihan" => [
                            "plotless",
                            "such",
                            "present",
                            "purely",
                        ],
                        "jawaban" => "such",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 39,
                        "soal" => "In a <u>solar battery</u>, a photosensitive <u>semiconducting</u> substance <u>such as</u> silicon crystal is the source of <u>electrician</u>.",
                        "pilihan" => [
                            "solar battery",
                            "semiconducting",
                            "such as",
                            "electrician",
                        ],
                        "jawaban" => "electrician",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 40,
                        "soal" => "<u>In early days</u>, hydrochloric acid was <u>done</u> by <u>heating</u> a mixture of sodium chloride <u>with</u> iron sulfate.",
                        "pilihan" => [
                            "In early days",
                            "done",
                            "heating",
                            "with",
                        ],
                        "jawaban" => "done",
                    ]
                ]
            ];
        } else if($id == 4){
            $data = [
                [
                    "tipe" => "petunjuk",
                    "data" => "READING"
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 1,
                        "soal" => "This passage is mainly about",
                        "pilihan" => [
                            "North American birds",
                            "Audubon's route to success as a painter of birds",
                            "the works that Audubon published",
                            "Audubon's preference for travel in natural habitats",
                        ],
                        "jawaban" => "Audubon's route to success as a painter of birds",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 2,
                        "soal" => "The word &quot;foremost&quot; in line 1 is closest in meaning to",
                        "pilihan" => [
                            "prior",
                            "leading",
                            "first",
                            "largest",
                        ],
                        "jawaban" => "leading",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 3,
                        "soal" => "In the second paragraph, the author mainly discusses",
                        "pilihan" => [
                            "how Audubon developed his painting style",
                            "Audubon's involvement in a mercantile business",
                            "where Audubon went on his excursions",
                            "Audubon's unsuccessful business practices",
                        ],
                        "jawaban" => "Audubon's unsuccessful business practices",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 4,
                        "soal" => "The word &quot;mode&quot; in line 7 could best be replaced by",
                        "pilihan" => [
                            "method",
                            "vogue",
                            "average",
                            "trend",
                        ],
                        "jawaban" => "method",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 5,
                        "soal" => "Audubon decided not to continue to pursue business when",
                        "pilihan" => [
                            "he was injured in an accident at a grist mill",
                            "he decided to study art in France",
                            "he was put in prison because he owed money",
                            "he made enough money from his paintings",
                        ],
                        "jawaban" => "he was put in prison because he owed money",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 6,
                        "soal" => "The word &quot;pursue&quot; in line 11 is closest in meaning to",
                        "pilihan" => [
                            "imagine",
                            "share",
                            "follow",
                            "deny",
                        ],
                        "jawaban" => "follow",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 7,
                        "soal" => "According to the passage, Audubon's paintings",
                        "pilihan" => [
                            "were realistic portrayals",
                            "used only black, white. and gray",
                            "were done in oils",
                            "depicted birds in cages",
                        ],
                        "jawaban" => "were realistic portrayals",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 8,
                        "soal" => "The word &quot;support&quot; in line 13 could best be replaced by",
                        "pilihan" => [
                            "tolerate",
                            "provide for",
                            "side with",
                            "fight for",
                        ],
                        "jawaban" => "provide for",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 9,
                        "soal" => "It can be inferred from the passage that after 1839 Audubon",
                        "pilihan" => [
                            "unsuccessfully tried to develop new businesses",
                            "continued to be supported by his wife",
                            "traveled to Europe",
                            "became wealthy",
                        ],
                        "jawaban" => "became wealthy",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 10,
                        "soal" => "The subject of the preceding paragraph was most likely",
                        "pilihan" => [
                            "ways of producing honey",
                            "stories in the media about killer bees",
                            "the chemical nature of killer bee attacks",
                            "the creation of the killer bee",
                        ],
                        "jawaban" => "stories in the media about killer bees",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 11,
                        "soal" => "The main idea of this passage is that killer bees",
                        "pilihan" => [
                            "have been in the news a lot recently",
                            "have been moving unexpectedly rapidly through the Americas",
                            "are not as aggressive as their reputation suggests",
                            "are a hybrid rather than a pure breed",
                        ],
                        "jawaban" => "are not as aggressive as their reputation suggests",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 12,
                        "soal" => "The word &quot;inflated&quot; in line 4 could best be replaced by",
                        "pilihan" => [
                            "exaggerated",
                            "blown",
                            "aired",
                            "burst",
                        ],
                        "jawaban" => "exaggerated",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 13,
                        "soal" => "It can be inferred from the passage that the killer bee",
                        "pilihan" => [
                            "traveled from Brazil to Africa in 1955",
                            "was a predecessor of the African bee",
                            "was carried from Africa to Brazil in 1955",
                            "did not exist early in the twentieth century",
                        ],
                        "jawaban" => "did not exist early in the twentieth century",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 14,
                        "soal" => "Why were African bees considered beneficial?",
                        "pilihan" => [
                            "They produced an unusual type of honey.",
                            "They spent their time traveling.",
                            "They were very aggressive.",
                            "They hid from inclement weather.",
                        ],
                        "jawaban" => "They were very aggressive.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 15,
                        "soal" => "A &quot;hybrid&quot; in line 5 is",
                        "pilihan" => [
                            "a mixture",
                            "a relative",
                            "a predecessor",
                            "an enemy",
                        ],
                        "jawaban" => "a mixture",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 16,
                        "soal" => "It is stated in the passage that killer bees",
                        "pilihan" => [
                            "are more deadly than African bees",
                            "are less aggressive than African bees",
                            "never attack animals",
                            "always attack African bees",
                        ],
                        "jawaban" => "are less aggressive than African bees",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 17,
                        "soal" => "The pronoun &quot;They&quot; in line 13 refers to",
                        "pilihan" => [
                            "killer bees",
                            "humans and animals",
                            "fatalities",
                            "experts",
                        ],
                        "jawaban" => "experts",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 18,
                        "soal" => "What is NOT mentioned in the passage as a contributing factor in an attack by killer bees?",
                        "pilihan" => [
                            "Panic by the victim",
                            "An odorous chemical",
                            "Disturbance of the bees",
                            "Inclement weather",
                        ],
                        "jawaban" => "Inclement weather",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 19,
                        "soal" => "Where in the passage does the author describe the size of the groups in which killer bees move?",
                        "pilihan" => [
                            "Lines 2-4",
                            "Lines 5-7",
                            "Lines 11-12",
                            "Lines 19-20",
                        ],
                        "jawaban" => "Lines 19-20",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 20,
                        "soal" => "This passage is about",
                        "pilihan" => [
                            "an idiomatic expression",
                            "an unusual color",
                            "a month on the calendar",
                            "a phase of the moon",
                        ],
                        "jawaban" => "an idiomatic expression",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 21,
                        "soal" => "How long has the expression &quot;once in a blue moon&quot; been around?",
                        "pilihan" => [
                            "For around 50 years",
                            "For less than 100 years",
                            "For more than 100 years",
                            "For 200 years",
                        ],
                        "jawaban" => "For more than 100 years",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 22,
                        "soal" => "A blue moon could best be described as",
                        "pilihan" => [
                            "a full moon that is not blue in color",
                            "a new moon that is blue in color",
                            "a full moon that is blue in color",
                            "a new moon that is not blue in color",
                        ],
                        "jawaban" => "a full moon that is not blue in color",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 23,
                        "soal" => "The word &quot;hue&quot; in line 7 is closest in meaning to",
                        "pilihan" => [
                            "shape",
                            "date",
                            "color",
                            "size",
                        ],
                        "jawaban" => "color",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 24,
                        "soal" => "Which of the following might be the date of a &quot;blue moon&quot;?",
                        "pilihan" => [
                            "January 1",
                            "February 28",
                            "April 15",
                            "December 31",
                        ],
                        "jawaban" => "December 31",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 25,
                        "soal" => "How many blue moons would there most likely be in a century?",
                        "pilihan" => [
                            "4",
                            "35",
                            "70",
                            "100",
                        ],
                        "jawaban" => "35",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 26,
                        "soal" => "According to the passage, the moon actually looked blue",
                        "pilihan" => [
                            "after large volcanic eruptions",
                            "when it occurred late in the month",
                            "several times a year",
                            "during the month of February",
                        ],
                        "jawaban" => "after large volcanic eruptions",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 27,
                        "soal" => "The expression &quot;given rise to. in line 19 could best be replaced by",
                        "pilihan" => [
                            "created a need for",
                            "elevated the level of",
                            "spurred the creation of",
                            "brightened the color of",
                        ],
                        "jawaban" => "spurred the creation of",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 28,
                        "soal" => "Where in the passage does the author describe the duration of a lunar cycle?",
                        "pilihan" => [
                            "Lines 1-3",
                            "Lines 5-6",
                            "Line 8",
                            "Lines 12-13",
                        ],
                        "jawaban" => "Line 8",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 29,
                        "soal" => "According to the passage, Giannini",
                        "pilihan" => [
                            "opened the Bank of America in 1904",
                            "worked in a bank in Italy",
                            "set up the Bank of America prior to setting up the Bank of Italy",
                            "later changed the name of the Bank of Italy",
                        ],
                        "jawaban" => "later changed the name of the Bank of Italy",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 30,
                        "soal" => "Where did Giannini open his first bank?",
                        "pilihan" => [
                            "In New York City",
                            "In what used to be a bar",
                            "On Washington Street Wharf",
                            "On a makeshift desk",
                        ],
                        "jawaban" => "In what used to be a bar",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 31,
                        "soal" => "According to the passage, which of the following is NOT true about the San Francisco earthquake?",
                        "pilihan" => [
                            "It happened in 1906.",
                            "It occurred in the aftermath of a fire.",
                            "It caused problems for Giannini's bank.",
                            "It was a tremendous earthquake.",
                        ],
                        "jawaban" => "It occurred in the aftermath of a fire.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 32,
                        "soal" => "The word &quot;raging&quot; in line 8 could best be replaced by",
                        "pilihan" => [
                            "angered",
                            "localized",
                            "intense",
                            "feeble",
                        ],
                        "jawaban" => "intense",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 33,
                        "soal" => "It can be inferred from the passage that Giannini used crates of oranges after the earthquake",
                        "pilihan" => [
                            "to hide the gold",
                            "to fill up the wagons",
                            "to provide nourishment for his customers",
                            "to protect the gold from the fire",
                        ],
                        "jawaban" => "to hide the gold",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 34,
                        "soal" => "The word &quot;chaos&quot; in line 10 is closest in meaning to",
                        "pilihan" => [
                            "legal system",
                            "extreme heat",
                            "overdevelopment",
                            "total confusion",
                        ],
                        "jawaban" => "total confusion",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 35,
                        "soal" => "The word &quot;consolidated&quot; in line 17 is closest in meaning 10",
                        "pilihan" => [
                            "hardened",
                            "merged",
                            "moved",
                            "sold",
                        ],
                        "jawaban" => "merged",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 36,
                        "soal" => "The passage stales that after his retirement, Giannini",
                        "pilihan" => [
                            "began selling off banks",
                            "caused economic misfortune to occur",
                            "supported the bank's new management",
                            "returned to work",
                        ],
                        "jawaban" => "returned to work",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 37,
                        "soal" => "The expression &quot;weathered the storm or in line 23 could best be replaced by",
                        "pilihan" => [
                            "found a cure for",
                            "rained on the parade of",
                            "survived the ordeal of",
                            "blew its stack at",
                        ],
                        "jawaban" => "survived the ordeal of",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 38,
                        "soal" => "Where in the passage does the author describe Giannini's first banking clients?",
                        "pilihan" => [
                            "Lines 2-5",
                            "Lines 7-8",
                            "Lines 12-13",
                            "Lines 14-16",
                        ],
                        "jawaban" => "Lines 2-5",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 39,
                        "soal" => "How is the information in the passage presented?",
                        "pilihan" => [
                            "In chronological order",
                            "In order of importance",
                            "A cause followed by an effect",
                            "Classifications with examples",
                        ],
                        "jawaban" => "In chronological order",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 40,
                        "soal" => "The paragraph following the passage most likely discusses",
                        "pilihan" => [
                            "bank failures during the Great Depression",
                            "a third major crisis of the Bank of America",
                            "the international development of the Bank of America",
                            "how Giannini spent his retirement",
                        ],
                        "jawaban" => "the international development of the Bank of America",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 41,
                        "soal" => "The topic of the passage is",
                        "pilihan" => [
                            "the development of thunderstorms and squall lines",
                            "the devastating effects of tornadoes",
                            "cumulus and cumulonimbus clouds",
                            "the power of tornadoes",
                        ],
                        "jawaban" => "the development of thunderstorms and squall lines",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 42,
                        "soal" => "&quot;Mechanisms&quot; in line 2 are most likely",
                        "pilihan" => [
                            "machines",
                            "motions",
                            "methods",
                            "materials",
                        ],
                        "jawaban" => "methods",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 43,
                        "soal" => "It can be inferred from the passage that, in summer,",
                        "pilihan" => [
                            "there is not a great temperature differential between higher and lower altitudes",
                            "the greater temperature differential between higher and lower altitudes makes thunderstorms more likely to occur",
                            "there is not much cold air higher up in the atmosphere",
                            "the temperature of rising air drops more slowly than it does in winter",
                        ],
                        "jawaban" => "the greater temperature differential between higher and lower altitudes makes thunderstorms more likely to occur",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 44,
                        "soal" => "The word &quot;benign&quot; in line 16 is closest in meaning to",
                        "pilihan" => [
                            "harmless",
                            "beneficial",
                            "ferocious",
                            "spectacular",
                        ],
                        "jawaban" => "harmless",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 45,
                        "soal" => "The expression &quot;in concert&quot; in line 17 could best be replaced by",
                        "pilihan" => [
                            "as a chorus",
                            "with other musicians",
                            "as a cluster",
                            "in a performance",
                        ],
                        "jawaban" => "as a cluster",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 46,
                        "soal" => "According to the passage, a &quot;squall line&quot; in line 20 is",
                        "pilihan" => [
                            "a lengthy cold front",
                            "a serious thunderstorm",
                            "a line of supercells",
                            "a string of thunderheads",
                        ],
                        "jawaban" => "a string of thunderheads",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 47,
                        "soal" => "The pronoun &quot;itself' in line 21 refers to",
                        "pilihan" => [
                            "a large-scale collision",
                            "a squall line",
                            "an advancing cold front",
                            "a layer of warm and moist air",
                        ],
                        "jawaban" => "an advancing cold front",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 48,
                        "soal" => "All of the following are mentioned in the passage about supercells EXCEPT that they",
                        "pilihan" => [
                            "are of short duration",
                            "have circling winds",
                            "have extraordinary power",
                            "can give birth to tornadoes",
                        ],
                        "jawaban" => "are of short duration",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 49,
                        "soal" => "This reading would most probably be assigned in which of the following courses?",
                        "pilihan" => [
                            "Geology",
                            "Meteorology",
                            "Marine Biology",
                            "Chemistry",
                        ],
                        "jawaban" => "Meteorology",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 50,
                        "soal" => "The paragraph following the passage most likely discusses",
                        "pilihan" => [
                            "the lightning and thunder associated with thunderstorms",
                            "various types of cloud formations",
                            "the forces that contribute to the formation of squall lines",
                            "the development of tornadoes within supercells",
                        ],
                        "jawaban" => "the development of tornadoes within supercells",
                    ]
                ],
            ];
        }

        foreach ($data as $i => $data) {
            $datas['id_sub'] = $id;
            $datas['item'] = $data['tipe'];

            if($data['tipe'] == 'soal'){
                $pilihan = "";
                foreach ($data['data']['pilihan'] as $pil) {
                    $pilihan .= "\"".$pil."\",";
                }
                $pilihan = substr($pilihan, 0, -1);
                $data_soal = "{\"soal\":\"<p>{no}".str_replace('"', '\"', $data['data']['soal'])."</p>\",\"pilihan\":[".$pilihan."],\"jawaban\":\"".$data['data']['jawaban']."\"}";
            } elseif($data['tipe'] == "audio") {
                $audio = $this->Main_model->get_one("audio", ["nama_audio" => str_replace(".mp3", "", $data['data'])]);
                $data_soal = $audio['id_audio'];
            } elseif ($data['tipe'] == "petunjuk") {
                $data_soal = $data['data'];
            }

            $datas['data'] = $data_soal;
            $datas['penulisan'] = "LTR";
            $datas['urutan'] = $i + 1;

            $this->subsoal->add_data("item_soal", $datas);
        }

        // echo "Selesai";
        redirect(base_url('subsoal'));
    }
}

/* End of file Soal.php */