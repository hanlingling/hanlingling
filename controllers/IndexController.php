<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;


class IndexController extends Controller
{
    public $layout = "menu.php";
    public $enableCsrfValidation = false;

    public function actionLsts()
    {
        //查询他是否有登录
        $session = \Yii::$app->session;
        $session->open();
        $re = $session->get('uname');
        if ($re) {
            return $this->render("lsts");
        } else {
            return $this->redirect("index.php?r=login/index");
        }

    }

    //IP展示
    public function actionIp()
    {
        $arr = \Yii::$app->db->createCommand("select * from we_ip")->queryAll();
        return $this->render("ip", ['arr' => $arr]);
    }

    //ip删除
    public function actionDel()
    {
        $id = \Yii::$app->request->get("id");
        $arr = \Yii::$app->db->createCommand()->delete("we_ip", ['iid' => $id])->execute();
        if ($arr) {
            return $this->redirect("index.php?r=index/ip");
        } else {
            echo "删除失败";
        }
    }

    public function actionRemove()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('uname');
        return $this->redirect("index.php?r=index/lsts");
    }

    //ip展示
    public function actionAdd()
    {
        if (empty($_POST)) {
            return $this->render("insert");
        } else {
            $session = \Yii::$app->session;
            $session->open();
            $re = $session->get('uname');
            $ip = \Yii::$app->request->post("ip");
            $res = \Yii::$app->db->createCommand("select * from we_ip where iip='$ip' and iuser='$re'")->queryAll();
            if ($res) {
                echo 1;
            } else {
                $arr = \Yii::$app->db->createCommand()->insert("we_ip", ['iip' => $ip, "iuser" => $re])->execute();
                if ($arr) {
                    echo 2;
                }
            }

        }
    }

    /*
     * 展示添加公众号*/
    public function actionNumadd()
    {
        if (empty($_POST)) {
            return $this->render("publicnum");
        } else {
            $session = \Yii::$app->session;
            $session->open();
            $re = $session->get('uname');
            //print_r($re);die;
            $num = \Yii::$app->request->post("num");
            //print_r($num);die;
            //$res=\Yii::$app->db->createCommand("select * from we_publicnum where num='$num' and iuser='$re'")->queryAll();
            //print_r($num);die;
            $arr = \Yii::$app->db->createCommand()->insert("we_publicnum", ['num' => $num, "iuser" =>$re])->execute();
            if($arr){
                $this->redirect("index.php?r=index/list");
            }
        }
    }
    /*
     * 查看公众号*/
    public function actionList()
    {
        $arr = \Yii::$app->db->createCommand("select * from we_publicnum")->queryAll();
        //print_r($res);die;
        if($arr){
            return $this->render("list",['arr' => $arr]);
        }
    }
    /*
     * 公众号删除*/
    public function actionNumde()
    {
        $id = \Yii::$app->request->get("id");
        $arr = \Yii::$app->db->createCommand()->delete("we_publicnum", ['id' => $id])->execute();
        if ($arr) {
            echo  "<script>alert('删除成功');location.href='index.php?r=index/list'</script>";
        } else {
            echo  "<script>alert('删除失败');location.href='index.php?r=index/list'</script>";
        }
    }
    /*
     * 公众号修改页面*/
    public function actionNumupd()
    {
        $id=$_GET['id'];
        //print_r($id);die;
        //$db= \Yii::$app->db->createCommand();
        $results['data']=\Yii::$app->db->createCommand("select * from we_publicnum where id='$id'")->queryOne();
        //print_r($results);die;
        return $this->renderPartial('update',$results);
    }
    /*
     * 修改数据*/
    public function actionNumlist()
    {
        $id = \Yii::$app->request->post('id');
        $iuser= \Yii::$app->request->post('iuser');
        $num = \Yii::$app->request->post('num');
        //print_r($data);die;
        $res=\Yii::$app->db->createCommand()->update("we_publicnum",['iuser' =>$iuser,'num'=>$num],"id=$id")->execute();
        //print_r($res);die;
        if($res==1){
           echo "<script>alert('修改成功');location.href='index.php?r=index/list'</script>";
        }else{
           echo "<script>alert('修改失败');location.href='index.php?r=index/list'</script>";
       }
    }

}

