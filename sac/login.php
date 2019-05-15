<br>
                          
                          
                        <table class="w3-table-all w3-hoverable">
                            <thead>
                              <tr class="w3-green">
                            <th><center>Contestant Name</center></th>
                                <th><center>Post Name</center></th>
                                <th><center>Number of votes</center></th>
                                
                              </tr>
                            </thead>
                            <?php
                            while($row5 = mysqli_fetch_array($result5)){
                            ?>
                            <tr>
                              <td><center><?php echo $row5['name'];?></center></td>
                              <td><center><?php $a=$row5['post_id'];$b=mysqli_query($con, "SELECT name FROM post WHERE post_id='$a'");$c=mysqli_fetch_array($b);echo $c['name'];?></center></td>
                              <td><center>
                                  <?php
                                  $eid=$row5['id'];
                                  $c2=mysqli_query($con, "SELECT * FROM result WHERE id= '$eid'");
                                  $count1=mysqli_num_rows($c2);
                                  echo $count1;
                                  ?></center>
                              </td>
                              
                            </tr>
                            <?php
                            }
                            ?>
                          </table>
                          <br>
                          <br>
                          <table class="w3-table-all w3-hoverable">
                            <thead>
                              <tr class="w3-green">
                            <th><center>Post Name</center></th>
                                <th><center>Current Lead</center></th>
                                <th><center>Number of votes</center></th>
                                
                              </tr>
                            </thead>
                            <?php
                            $result7 = mysqli_query($con, "SELECT * FROM post");
                            
                            while($row7 = mysqli_fetch_array($result7)){
                            ?>
                            <tr>
                              <td><center><?php echo $row7['name'];?></center></td>
                              
                              <td><center>
                                  <?php
                                  $p=$row7['post_id'];
                                  $result9 = mysqli_query($con, "SELECT id FROM contestant WHERE post_id='$p'");
                                  $re1 = mysqli_query($con, "SELECT id FROM contestant WHERE post_id='$p'");
                                  $max=0;
                                  $maxid="0";
                                  $f=0;
                                  while($row9 = mysqli_fetch_array($result9)){
                                  $eid=$row9['id'];
                                  $c2=mysqli_query($con, "SELECT * FROM result WHERE id= '$eid'");
                                  $count1=mysqli_num_rows($c2);
                                  if ($count1 > $max) {
                                        $max=$count1;
                                        $maxid=$eid;
                                    }
                                    }
                                     while($rd1 = mysqli_fetch_array($re1)){
                                  $eid=$rd1['id'];
                                  $c2=mysqli_query($con, "SELECT * FROM result WHERE id= '$eid'");
                                  $count1=mysqli_num_rows($c2);
                                  if ($count1 == $max&&$eid!=$maxid) {
                                        $f=1;
                                        break;
                                    }
                                    }
                                    if ($f == 1) {
                                        $f=0;
                                        echo "TIE";
                                    }
                                    else {
                                        $r9 = mysqli_query($con, "SELECT name FROM contestant WHERE id='$maxid'");
                                        $r9 = mysqli_fetch_array($r9);
                                        echo $r9['name'];
                                    }
                                  ?></center>
                              </td>
                              <td><center><?php echo $max;?></center></td>
                            </tr>
                            
                            <?php
                            }
                            ?>
                          </table>