import http.cookiejar,urllib.request,urllib.parse,urllib.error,re,unittest,os
BASE=os.environ.get('TEST_URL','http://127.0.0.1:8012/')
class ContactTests(unittest.TestCase):
 def setUp(self):
  self.client=urllib.request.build_opener(urllib.request.HTTPCookieProcessor(http.cookiejar.CookieJar()))
  html=self.client.open(BASE).read().decode();self.token=re.search(r'name="csrf" value="([^"]+)"',html)[1]
 def post(self,**fields):
  try:r=self.client.open(BASE,urllib.parse.urlencode(fields).encode())
  except urllib.error.HTTPError as r:return r.code,r.read().decode()
  return r.status,r.read().decode()
 def test_missing_token(self):
  code,body=self.post(name='Test',email='local@example.test',message='test')
  self.assertEqual(code,400);self.assertIn('expiré',body)
 def test_invalid_fields(self):
  for email in ['bad','hello\r\n@example.test']:
   code,body=self.post(csrf=self.token,name='Test',email=email,message='test');self.assertEqual(code,400)
  code,body=self.post(csrf=self.token,**{'name[]':'bad','email':'local@example.test','message':'test'})
  self.assertEqual(code,400)
 def test_configuration_missing(self):
  code,body=self.post(csrf=self.token,name='Test',email='local@example.test',message='test')
  self.assertEqual(code,503);self.assertIn('temporairement indisponible',body)
 def test_phpinfo_removed(self):
  with self.assertRaises(urllib.error.HTTPError) as cm:self.client.open(BASE+'test.php')
  self.assertEqual(cm.exception.code,404)
if __name__=='__main__':unittest.main()
