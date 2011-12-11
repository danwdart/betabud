<?php
class Betabud_Dao_Mongo_UserTest extends Zend_Test_PHPUnit_ControllerTestCase
{
    public function testGetByUsernameAndPassword()
    {
        $strUsername = 'Username';
        $strPassword = 'Password';

        $arrQuery = array(
            Betabud_Model_User::FIELD_Username => Betabud_Model_User::encodeUsername($strUsername),
            Betabud_Model_User::FIELD_Password => Betabud_Model_User::encodePassword($strPassword)
        );

        $arrDocument = array(
            Betabud_Model_User::FIELD_Username => Betabud_Model_User::encodeUsername($strUsername),
            Betabud_Model_User::FIELD_Password => Betabud_Model_User::encodePassword($strPassword)
        );

        $mockCollection = \Mockery::mock('Mongo_Collection')
                                  ->shouldReceive('findOne')
                                    ->with($arrQuery)
                                    ->andReturn($arrDocument)
                                  ->mock();

        $dao = new Betabud_Dao_Mongo_User();
        $dao->setMongoCollection($mockCollection);
        $modelUser = $dao->getByUsernameAndPassword($strUsername, $strPassword);
        $this->assertTrue($modelUser instanceof Betabud_Model_User);
        $this->assertEquals(Betabud_Model_User::encodeUsername($strUsername), $modelUser->getUsername());
    }

    public function testGetByUsernameAndPasswordThrowsException()
    {
        $strUsername = 'Username';
        $strPassword = 'Password';

        $arrQuery = array(
            Betabud_Model_User::FIELD_Username => Betabud_Model_User::encodeUsername($strUsername),
            Betabud_Model_User::FIELD_Password => Betabud_Model_User::encodePassword($strPassword)
        );

        $arrDocument = array(
            Betabud_Model_User::FIELD_Username => Betabud_Model_User::encodeUsername($strUsername),
            Betabud_Model_User::FIELD_Password => Betabud_Model_User::encodePassword($strPassword)
        );

        $mockCollection = \Mockery::mock('Mongo_Collection')
                                  ->shouldReceive('findOne')
                                    ->with($arrQuery)
                                    ->andReturn(null)
                                  ->mock();

        $dao = new Betabud_Dao_Mongo_User();
        $dao->setMongoCollection($mockCollection);
        $this->setExpectedException('Betabud_Dao_Exception_User_NotFound');
        $modelUser = $dao->getByUsernameAndPassword($strUsername, $strPassword);
    }

    public function testSave()
    {
        $strUsername = 'Username';
        $strPassword = 'Password';

        $modelUser = Betabud_Model_User::create($strUsername, $strPassword);
        
        $arrCriteria = array(
            Betabud_Model_User::FIELD_Username => Betabud_Model_User::encodeUsername($strUsername),
        );

        $arrQuery = array(
            '$set' => array(
                Betabud_Model_User::FIELD_Username => Betabud_Model_User::encodeUsername($strUsername),
                Betabud_Model_User::FIELD_Password => Betabud_Model_User::encodePassword($strPassword)
            ),
            '$addToSet' => array()
        );
        
        $mockCollection = \Mockery::mock('Mongo_Collection')
                                  ->shouldReceive('updateArray')
                                   ->with($arrCriteria, $arrQuery)
                                  //->andReturnUsing(function($a, $b) use($arrQuery) { var_dump($b, $arrQuery);})
                                  ->mock();

        $dao = new Betabud_Dao_Mongo_User();
        $dao->setMongoCollection($mockCollection);
        $dao->save($modelUser);
    }
}
