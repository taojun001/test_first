<?php
  session_start();
  
  $rnd=array(0,1,2,3,4,5,6,7,8,9,a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z);
  for($i=0;$i<4;$i++)
  {
	$vc.=$rnd[rand(0,61)];
  }
  $_SESSION['svc']=$vc;
  
  $width=50; //验证码的宽度为50px
  $height=25;//验证码的高度为25px
  header("content-type:image/png"); //输出网页的内容是png格式的图片
  $im=imagecreate($width,$height); //创建一个基于调色板的宽度为50，高度为25的图像代码
  $back=imagecolorallocate($im,255,255,255); //为上面创建的图像im分配R,G,B颜色（白色）作为背景色
  $pix=imagecolorallocate($im,187,230,247); //为上面创建的图像im分配R,G,B颜色（淡湖蓝色）作为模糊点颜色 
  $font=imagecolorallocate($im,41,163,238); //为上面创建的图像im分配R,G,B颜色（湖蓝色）作为字体颜色 

  for($i=0;$i<1000;$i++) //绘制1000个模糊作用的点 
  { 
   imagesetpixel($im,rand(0,$width),rand(0,$height),$pix); //在上面创建的图像im中画一个单一像素的点包括X轴位置、Y轴位置以及点的颜色
  }
  imagestring($im,5,7,5,$vc,$font);//在上面创建的图像im中绘制字符串，字体大小为5（只能是1-5的范围之内），字符串起点坐标X轴为7、Y轴为5，字符串的内容是$vc，字符串的字体颜色为$font
  imagerectangle($im,0,0,$width-1,$height-1,$font);//在上面创建的图像im上绘制矩形，左上角起点坐标X轴0，Y轴0，右下角终点坐标X轴为$width-1（即图像宽度-1），Y轴为$height-1（即图像高度-1），矩形颜色为$font
  imagepng($im); //使用$im变量的内容（代码）创建一张png格式的图片。相当于输出图片。
  imagedestroy($im); //销毁图像，释放与im相关联的内存

?> 

