<?php
  session_start();
  
  $rnd=array(0,1,2,3,4,5,6,7,8,9,a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z);
  for($i=0;$i<4;$i++)
  {
	$vc.=$rnd[rand(0,61)];
  }
  $_SESSION['svc']=$vc;
  
  $width=50; //��֤��Ŀ��Ϊ50px
  $height=25;//��֤��ĸ߶�Ϊ25px
  header("content-type:image/png"); //�����ҳ��������png��ʽ��ͼƬ
  $im=imagecreate($width,$height); //����һ�����ڵ�ɫ��Ŀ��Ϊ50���߶�Ϊ25��ͼ�����
  $back=imagecolorallocate($im,255,255,255); //Ϊ���洴����ͼ��im����R,G,B��ɫ����ɫ����Ϊ����ɫ
  $pix=imagecolorallocate($im,187,230,247); //Ϊ���洴����ͼ��im����R,G,B��ɫ��������ɫ����Ϊģ������ɫ 
  $font=imagecolorallocate($im,41,163,238); //Ϊ���洴����ͼ��im����R,G,B��ɫ������ɫ����Ϊ������ɫ 

  for($i=0;$i<1000;$i++) //����1000��ģ�����õĵ� 
  { 
   imagesetpixel($im,rand(0,$width),rand(0,$height),$pix); //�����洴����ͼ��im�л�һ����һ���صĵ����X��λ�á�Y��λ���Լ������ɫ
  }
  imagestring($im,5,7,5,$vc,$font);//�����洴����ͼ��im�л����ַ����������СΪ5��ֻ����1-5�ķ�Χ֮�ڣ����ַ����������X��Ϊ7��Y��Ϊ5���ַ�����������$vc���ַ�����������ɫΪ$font
  imagerectangle($im,0,0,$width-1,$height-1,$font);//�����洴����ͼ��im�ϻ��ƾ��Σ����Ͻ��������X��0��Y��0�����½��յ�����X��Ϊ$width-1����ͼ����-1����Y��Ϊ$height-1����ͼ��߶�-1����������ɫΪ$font
  imagepng($im); //ʹ��$im���������ݣ����룩����һ��png��ʽ��ͼƬ���൱�����ͼƬ��
  imagedestroy($im); //����ͼ���ͷ���im��������ڴ�

?> 

