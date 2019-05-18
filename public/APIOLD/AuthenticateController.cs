using MusicAPIStore.AES256Encryption;
using MusicAPIStore.Context;
using MusicAPIStore.Models;
using MusicAPIStore.Repository;
using System;
using System.Configuration;
using System.Data.Entity;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Security.Cryptography;
using System.Text;
using System.Web.Http;

namespace MusicAPIStore.Controllers
{
    public class AuthenticateController : ApiController
    {
        private DatabaseContext db = new DatabaseContext();

        IAuthenticate _IAuthenticate;
        public AuthenticateController()
        {
            _IAuthenticate = new AuthenticateConcrete();
        }


        // POST: api/Authenticate --Login
        [Route("api/Login")]
        public HttpResponseMessage Authenticate([FromBody]Styles_Users ClientKeys)
        {
            if (string.IsNullOrEmpty(ClientKeys.UserName) && string.IsNullOrEmpty(ClientKeys.Password))
            {
                var message = new HttpResponseMessage(HttpStatusCode.NotAcceptable);
                message.Content = new StringContent("Not Valid Request");
                return message;
            }
            else
            {
                // ClientKeys.Password = EncryptionLibrary.EncryptText(ClientKeys.Password);
                ClientKeys.Password = GetMD5HashData(ClientKeys.Password.Trim());
                if (_IAuthenticate.ValidateKeys(ClientKeys))
                {
                    var clientkeys = _IAuthenticate.GetClientKeysDetailsbyCLientIDandClientSecert(ClientKeys.UserName, ClientKeys.Password);

                    if (clientkeys == null)
                    {
                        var resp = Request.CreateResponse<RegisterResponseModel>(
     HttpStatusCode.NotAcceptable,
     new RegisterResponseModel() { status = false, data = "", error_message = "" }
 );
                        return resp;

                    }
                    else
                    {
                        if (_IAuthenticate.IsTokenAlreadyExists(ClientKeys.ID_User))
                        {
                            _IAuthenticate.DeleteGenerateToken(ClientKeys.ID_User);

                            return GenerateandSaveToken(clientkeys);
                        }
                        else
                        {
                            return GenerateandSaveToken(clientkeys);
                        }
                    }
                }
                else
                {
                    var resp = Request.CreateResponse<RegisterResponseModel>(
     HttpStatusCode.NotAcceptable,
     new RegisterResponseModel() { status = false, data = "", error_message = "User or password is not correct!" }
 );
                    return resp;
                }
            }
        }


        [NonAction]
        public static string GetMD5HashData(string data)
        {
            //create new instance of md5
            MD5 md5 = MD5.Create();

            //convert the input text to array of bytes
            byte[] hashData = md5.ComputeHash(Encoding.Default.GetBytes(data));

            //create new instance of StringBuilder to save hashed data
            StringBuilder returnValue = new StringBuilder();

            //loop for each byte and add it to StringBuilder
            for (int i = 0; i < hashData.Length; i++)
            {
                returnValue.Append(hashData[i].ToString());
            }

            // return hexadecimal string
            return returnValue.ToString();

        }

        [NonAction]
        private HttpResponseMessage GenerateandSaveToken(Styles_Users clientkeys)
        {
            var IssuedOn = DateTime.Now;
            var newToken = _IAuthenticate.GenerateToken(clientkeys, IssuedOn);
            TokensManager token = new TokensManager();
            token.TokenID = 0;
            token.TokenKey = newToken;
            token.CompanyID = clientkeys.ID_User;
            token.IssuedOn = IssuedOn;
            token.ExpiresOn = DateTime.Now.AddMinutes(Convert.ToInt32(ConfigurationManager.AppSettings["TokenExpiry"]));
            token.CreatedOn = DateTime.Now;
            var result = _IAuthenticate.InsertToken(token);

            if (result == 1)
            {
                //Cập nhập online
                Styles_Users updateUser = db.Styles_Users.Find(clientkeys.ID_User);
                updateUser.IsOnline = true;
                db.Entry(updateUser).State = EntityState.Modified;
                db.SaveChanges();
                var resp = Request.CreateResponse<RegisterResponseModel>(
 HttpStatusCode.OK,
 new RegisterResponseModel() { status = true, data = new LoginDataResponseModel() { FullName = clientkeys.FullName, UserID = clientkeys.ID_User.ToString(), Email = clientkeys.Email, AccessToken = newToken, Avatar = clientkeys.Image }, error_message = "" }
);
                return resp;
                //HttpResponseMessage response = new HttpResponseMessage();
                //response = Request.CreateResponse(HttpStatusCode.OK, "Authorized");
                //response.Headers.Add("Token", newToken);
                //response.Headers.Add("TokenExpiry", ConfigurationManager.AppSettings["TokenExpiry"]);
                //response.Headers.Add("Access-Control-Expose-Headers", "Token,TokenExpiry");
                //return response;
            }
            else
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
     HttpStatusCode.NotAcceptable,
     new RegisterResponseModel() { status = false, data = "", error_message = "" }
 );
                return resp;
            }
        }
        IStyles_Users repository;
        [Route("api/Register")]
        // Post: api/Authenticate -- Register
        public HttpResponseMessage Register([FromBody]Styles_Users ClientKeys)
        {
            repository = new Styles_Users_Concrete();
            // Validating Username 


            if (repository.ValidateUsername(ClientKeys))
            {
                ModelState.AddModelError("", "User is Already Registered");
                var resp = Request.CreateResponse<RegisterResponseModel>(
    HttpStatusCode.NotAcceptable,
    new RegisterResponseModel() { status = false, data = "", error_message = "User is Already Registered" }
);
                return resp;
            }


            // Encrypting Password with AES 256 Algorithm
            ClientKeys.UserName = ClientKeys.UserName;

            ClientKeys.Password = GetMD5HashData(ClientKeys.Password.Trim());
            //ClientKeys.Password = Cls_Users.GetMD5HashData(ClientKeys.Password.Trim());
            ClientKeys.Email = ClientKeys.Email;
            ClientKeys.FullName = ClientKeys.FullName;

            ClientKeys.Telephone = ClientKeys.Telephone;
            ClientKeys.Address = "";
            ClientKeys.PassPort = "";
            ClientKeys.Active = false;
            ClientKeys.AlterEmail = ClientKeys.Email;
            ClientKeys.Birthday = new DateTime(1911, 11, 11);
            ClientKeys.CMND = "";
            ClientKeys.FaceBook = "";
            ClientKeys.Gender = ClientKeys.Gender;
            ClientKeys.Image = "";
            ClientKeys.Logo = "";
            ClientKeys.LanguageCode = "vi";
            ClientKeys.Last_IP = "";
            ClientKeys.LastLogin = DateTime.Now;
            //false = 0
            ClientKeys.Lock = true;
            ClientKeys.NickName = "";
            ClientKeys.RegTime = DateTime.Now;
            ClientKeys.Skype = "";
            ClientKeys.Yahoo = "";
            ClientKeys.CompanyName = "";
            ClientKeys.CompanyNumber = "";
            ClientKeys.IDDate = DateTime.Now;
            ClientKeys.IsCompany = false;
            ClientKeys.TaxNumber = "";
            ClientKeys.TotalView = 0;

            ClientKeys.ID_Role = 0;
            ClientKeys.IsStore = false;
            ClientKeys.StoreID = "";
            ClientKeys.Latitude = 0;
            ClientKeys.Longitude = 0;
            ClientKeys.ListProductViewed = "";
            ClientKeys.SearchHistory = "";
            ClientKeys.RatingAverage = 0;
            ClientKeys.ShopConfig = "";
            ClientKeys.IDPlace = 0;
            ClientKeys.Point = 0;
            ClientKeys.PointB = 0;
            ClientKeys.StartTime = DateTime.Now;
            ClientKeys.ExpTime = DateTime.Now;

            ClientKeys.FileCapacityProfile = "";
            ClientKeys.FileCatalog = "";
            ClientKeys.TotalRevenue = 0;
            ClientKeys.CellPhone = "";
            ClientKeys.Website = "";
            ClientKeys.Zalo = "";
            ClientKeys.WhatApps = "";
            ClientKeys.ID_Location = ClientKeys.ID_Location;
            ClientKeys.BuySellBoth = "";
            ClientKeys.ID_BusinessType = 0;
            ClientKeys.NumberOfMember = 0;
            ClientKeys.NumberOfEmployee = 0;
            ClientKeys.YearEstablished = 0;
            ClientKeys.ExportMarkets = "";
            ClientKeys.ResponseRate = 0;
            ClientKeys.ResponseTime = 0;

            ClientKeys.UserCode = SoPhieuMoi(ClientKeys.ID_Location.ToString());
            ClientKeys.CompanyRepresentative = "";
            ClientKeys.RegisteredAddress = "";
            ClientKeys.AddressSalesOffice = "";
            ClientKeys.FactoryAddress = "";
            ClientKeys.LogoStore = "";
            ClientKeys.MainProduct = "";
            ClientKeys.ID_Business_Enterprise = 1;
            ClientKeys.ID_Source = 1;
            ClientKeys.ID_Status = 1;
            ClientKeys.BusinessCapital = "";
            ClientKeys.ManageCertificate = "";
            ClientKeys.AdminUser = "";

            ClientKeys.StoreType = 0;
            ClientKeys.Theme = "";
            ClientKeys.Level = 0;
            ClientKeys.ID_Theme = 0;
            ClientKeys.LogoBuyer = "";
            ClientKeys.BannerImage = "";
            ClientKeys.AboutStore = "";
            ClientKeys.LogoPending = "";
            ClientKeys.LockPending = false;
            ClientKeys.ID_Type = 0;
            ClientKeys.IsRegisterTeam = false;
            ClientKeys.IsOnline = false;
            ClientKeys.NumberPeopleTeam = 0;

            ClientKeys.Hidden = false;
          
            //repository.Add(ClientKeys);

            if (repository.Add(ClientKeys)=="1")
            {
                int IDUser = ClientKeys.ID_User;
                Styles_Contacts insertContact = new Styles_Contacts();
                insertContact.Email = ClientKeys.Email.Trim();
                insertContact.Birthday = new DateTime(1911, 11, 11);
                insertContact.CreateDate = DateTime.Now;
                insertContact.CreatedByID = "";
                insertContact.FullName = ClientKeys.FullName.Trim();
                insertContact.Hidden = false;
                insertContact.ID_User = IDUser;
                insertContact.IsPrimaryContact = true;
                insertContact.LastModifiedByID = "";
                insertContact.LastModifiedDate = DateTime.Now;
                insertContact.Note = "";
                insertContact.Phone = "";
                insertContact.Position = "";
                insertContact.UserName = "";
                insertContact.Weight = db.Styles_Contacts.Count() + 1;
                db.Styles_Contacts.Add(insertContact);
                db.SaveChanges();

                Styles_Users_Translation UsersVN = new Styles_Users_Translation();
                UsersVN.ID_User = IDUser;
                UsersVN.LanguageCode = "vi";
                UsersVN.Slogan = "";
                UsersVN.TermOfService = "";
                UsersVN.ContactDescription = "";
                UsersVN.Description = "";
                UsersVN.TitleWeb = "";
                UsersVN.Link_SEO = "";
                UsersVN.H1_SEO = "";
                UsersVN.Meta_Keywords = "";
                UsersVN.MetaDescription = "";
                UsersVN.ContentResponseFollow = "";
                UsersVN.ContentResponseChat = "";
                UsersVN.SalePolicy = "";
                UsersVN.ShipPolicy = "";
                UsersVN.GuaranteePolicy = "";
                UsersVN.Speciality_Services = "";
                UsersVN.Number_Experience = "";
                UsersVN.Payments = "";
                UsersVN.Area_work = "";
                UsersVN.Description_Capacity = "";
                UsersVN.Hidden = false;
                db.Styles_Users_Translation.Add(UsersVN);
                db.SaveChanges();

                Styles_Users_Translation UsersEN = new Styles_Users_Translation();
                UsersEN.ID_User = IDUser;
                UsersEN.LanguageCode = "vi";
                UsersEN.Slogan = "";
                UsersEN.TermOfService = "";
                UsersEN.ContactDescription = "";
                UsersEN.Description = "";
                UsersEN.TitleWeb = "";
                UsersEN.Link_SEO = "";
                UsersEN.H1_SEO = "";
                UsersEN.Meta_Keywords = "";
                UsersEN.MetaDescription = "";
                UsersEN.ContentResponseFollow = "";
                UsersEN.ContentResponseChat = "";
                UsersEN.SalePolicy = "";
                UsersEN.ShipPolicy = "";
                UsersEN.GuaranteePolicy = "";
                UsersEN.Speciality_Services = "";
                UsersEN.Number_Experience = "";
                UsersEN.Payments = "";
                UsersEN.Area_work = "";
                UsersEN.Description_Capacity = "";
                UsersEN.Hidden = false;
                db.Styles_Users_Translation.Add(UsersEN);
                db.SaveChanges();
            }


            return GenerateandSaveTokenRegister(ClientKeys);


        }
        public class ModelSoPhieuMoi
        {
            public string Description { get; set; }
        }
        public string SoPhieuMoi(string ID)
        {
            try
            {
                int ID_Location = Convert.ToInt32(ID);
                string MaQuocGia = db.Database.SqlQuery<ModelSoPhieuMoi>("Select Description from Styles_Users_Locations,Styles_Users_Locations_Translation where Styles_Users_Locations.LocationParent=0 and ( Styles_Users_Locations.ID_Location=" + ID_Location + " or Styles_Users_Locations.ListChild like ('%|' + cast(" + ID_Location + " as varchar(5)) +'|%') ) and Styles_Users_Locations_Translation.LanguageCode='vi' and Styles_Users_Locations_Translation.ID_Location=Styles_Users_Locations.ID_Location").Single().Description.ToString();
                object ob = db.Styles_Users.Select(d => d.ID_User).Max();

                if (ob == DBNull.Value)
                    return MaQuocGia + "00000000001";
                else
                    return MaQuocGia + (Convert.ToInt64(ob) + 1).ToString("00000000000");
            }
            catch (Exception ex) { throw ex; }
        }

        public string SoPhieuMoiSocial()
        {
            try
            {
                string MaQuocGia = "VN";
                object ob = db.Styles_Users.Select(d => d.ID_User).Max();

                if (ob == DBNull.Value)
                    return MaQuocGia + "00000000001";
                else
                    return MaQuocGia + (Convert.ToInt64(ob) + 1).ToString("00000000000");
            }
            catch (Exception ex) { throw ex; }
        }


        [Route("api/RegisterSocial/{user}/{email}/{fullname}/{type}")]
        public HttpResponseMessage RegisterSocial(string user, string email, string fullname, string type)
        {
            var UserFind = (from User in db.Styles_Users
                            where User.UserName == user || (User.Email == email && User.ID_Type.ToString() == type)
                            select User);
            var usercount = UserFind.Count();
            if (usercount > 0)
            {
                return GenerateandSaveTokenRegisterSocial(UserFind.SingleOrDefault());
            }
            else
            {
                Styles_Users newUser = new Styles_Users();
                newUser.UserName = user;
                newUser.Email = email=="null"?"":email;
                newUser.FullName = fullname;
                newUser.Password = GetMD5HashData(user.Trim());
                newUser.Telephone = "";
                newUser.Address = "";
                newUser.PassPort = "";
                newUser.Active = true;
                newUser.AlterEmail = "";
                newUser.Birthday = new DateTime(1911, 11, 11);
                newUser.CMND = "";
                newUser.FaceBook = "";
                newUser.Gender = true;
                newUser.Image = "";
                newUser.Logo = "";
                newUser.LanguageCode = "vi";
                newUser.Last_IP = "";
                newUser.LastLogin = DateTime.Now;
                //false = 0
                newUser.Lock = false;
                newUser.NickName = "";
                newUser.RegTime = DateTime.Now;
                newUser.Skype = "";
                newUser.Yahoo = "";
                newUser.CompanyName = "";
                newUser.CompanyNumber = "";
                newUser.IDDate = DateTime.Now;
                newUser.IsCompany = false;
                newUser.TaxNumber = "";
                newUser.TotalView = 0;
                newUser.ID_Role = 0;
                newUser.IsStore = false;
                newUser.StoreID = "";
                newUser.Latitude = 0;
                newUser.Longitude = 0;
                newUser.ListProductViewed = "";
                newUser.SearchHistory = "";
                newUser.RatingAverage = 0;
                newUser.ShopConfig = "";
                newUser.IDPlace = 0;
                newUser.Point = 0;
                newUser.PointB = 0;
                newUser.StartTime = DateTime.Now;
                newUser.ExpTime = DateTime.Now;
                newUser.FileCapacityProfile = "";
                newUser.FileCatalog = "";
                newUser.TotalRevenue = 0;
                newUser.CellPhone = "";
                newUser.Website = "";
                newUser.Zalo = "";
                newUser.WhatApps = "";
                newUser.ID_Location = 1;
                newUser.BuySellBoth = "b";
                newUser.ID_BusinessType = 0;
                newUser.NumberOfMember = 0;
                newUser.NumberOfEmployee = 0;
                newUser.YearEstablished = 0;
                newUser.ExportMarkets = "";
                newUser.ResponseRate = 0;
                newUser.ResponseTime = 0;
                newUser.UserCode = SoPhieuMoiSocial();
                newUser.CompanyRepresentative = "";
                newUser.RegisteredAddress = "";
                newUser.AddressSalesOffice = "";
                newUser.FactoryAddress = "";
                newUser.LogoStore = "";
                newUser.MainProduct = "";
                newUser.ID_Business_Enterprise = 1;
                newUser.ID_Source = 1;
                newUser.ID_Status = 1;
                newUser.BusinessCapital = "";
                newUser.ManageCertificate = "";
                newUser.AdminUser = "";
                newUser.StoreType = 0;
                newUser.Theme = "";
                newUser.Level = 0;
                newUser.ID_Theme = 0;
                newUser.LogoBuyer = "";
                newUser.BannerImage = "";
                newUser.AboutStore = "";
                newUser.LogoPending = "";
                newUser.LockPending = false;
                newUser.ID_Type = Convert.ToInt32(type);
                newUser.IsRegisterTeam = false;
                newUser.IsOnline = false;
                newUser.NumberPeopleTeam = 0;
                newUser.Hidden = false;
                db.Styles_Users.Add(newUser);
                //db.SaveChanges();
                if (db.SaveChanges()==1)
                {
                    int IDUser = newUser.ID_User;
                    Styles_Contacts insertContact = new Styles_Contacts();
                    insertContact.Email = email.Trim();
                    insertContact.Birthday = new DateTime(1911, 11, 11);
                    insertContact.CreateDate = DateTime.Now;
                    insertContact.CreatedByID = "";
                    insertContact.FullName = fullname.Trim();
                    insertContact.Hidden = false;
                    insertContact.ID_User = IDUser;
                    insertContact.IsPrimaryContact = true;
                    insertContact.LastModifiedByID = "";
                    insertContact.LastModifiedDate = DateTime.Now;
                    insertContact.Note = "";
                    insertContact.Phone = "";
                    insertContact.Position = "";
                    insertContact.UserName = "";
                    insertContact.Weight = db.Styles_Contacts.Count() + 1;
                    db.Styles_Contacts.Add(insertContact);
                    db.SaveChanges();

                    Styles_Users_Translation UsersVN = new Styles_Users_Translation();
                    UsersVN.ID_User = IDUser;
                    UsersVN.LanguageCode = "vi";
                    UsersVN.Slogan = "";
                    UsersVN.TermOfService = "";
                    UsersVN.ContactDescription = "";
                    UsersVN.Description = "";
                    UsersVN.TitleWeb = "";
                    UsersVN.Link_SEO = "";
                    UsersVN.H1_SEO = "";
                    UsersVN.Meta_Keywords = "";
                    UsersVN.MetaDescription = "";
                    UsersVN.ContentResponseFollow = "";
                    UsersVN.ContentResponseChat = "";
                    UsersVN.SalePolicy = "";
                    UsersVN.ShipPolicy = "";
                    UsersVN.GuaranteePolicy = "";
                    UsersVN.Speciality_Services = "";
                    UsersVN.Number_Experience = "";
                    UsersVN.Payments = "";
                    UsersVN.Area_work = "";
                    UsersVN.Description_Capacity = "";
                    UsersVN.Hidden = false;
                    db.Styles_Users_Translation.Add(UsersVN);
                    db.SaveChanges();

                    Styles_Users_Translation UsersEN = new Styles_Users_Translation();
                    UsersEN.ID_User = IDUser;
                    UsersEN.LanguageCode = "vi";
                    UsersEN.Slogan = "";
                    UsersEN.TermOfService = "";
                    UsersEN.ContactDescription = "";
                    UsersEN.Description = "";
                    UsersEN.TitleWeb = "";
                    UsersEN.Link_SEO = "";
                    UsersEN.H1_SEO = "";
                    UsersEN.Meta_Keywords = "";
                    UsersEN.MetaDescription = "";
                    UsersEN.ContentResponseFollow = "";
                    UsersEN.ContentResponseChat = "";
                    UsersEN.SalePolicy = "";
                    UsersEN.ShipPolicy = "";
                    UsersEN.GuaranteePolicy = "";
                    UsersEN.Speciality_Services = "";
                    UsersEN.Number_Experience = "";
                    UsersEN.Payments = "";
                    UsersEN.Area_work = "";
                    UsersEN.Description_Capacity = "";
                    UsersEN.Hidden = false;
                    db.Styles_Users_Translation.Add(UsersEN);
                    db.SaveChanges();
                }

                return GenerateandSaveTokenRegisterSocial(newUser);
            }
        }

        //Tạo toke đăng ký mạng xã hội
        [NonAction]
        private HttpResponseMessage GenerateandSaveTokenRegisterSocial(Styles_Users newUser)
        {
            var IssuedOn = DateTime.Now;
            var newToken = _IAuthenticate.GenerateToken(newUser, IssuedOn);
            TokensManager token = new TokensManager();
            token.TokenID = 0;
            token.TokenKey = newToken;
            token.CompanyID = 1;
            token.IssuedOn = IssuedOn;
            token.ExpiresOn = DateTime.Now.AddMinutes(Convert.ToInt32(ConfigurationManager.AppSettings["TokenExpiry"]));
            token.CreatedOn = DateTime.Now;
            var result = _IAuthenticate.InsertToken(token);

            if (result == 1)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
  HttpStatusCode.OK,
  new RegisterResponseModel() { status = true, data = new RegisterDataResponseModel() { FullName = newUser.FullName, UserID = newUser.ID_User.ToString(), Email = newUser.Email, AccessToken = newToken, Avatar = newUser.Image }, error_message = "" }
);
                return resp;
                //HttpResponseMessage response = new HttpResponseMessage();
                //response = Request.CreateResponse(HttpStatusCode.OK, "Authorized");
                //response.Headers.Add("Token", newToken);
                //response.Headers.Add("TokenExpiry", ConfigurationManager.AppSettings["TokenExpiry"]);
                //response.Headers.Add("Access-Control-Expose-Headers", "Token,TokenExpiry");
                //return response;
            }
            else
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
    HttpStatusCode.NotAcceptable,
    new RegisterResponseModel() { status = false, data = "", error_message = "" }
);
                return resp;
            }
        }


        //Tạo toke đăng ký
        [NonAction]
        private HttpResponseMessage GenerateandSaveTokenRegister(Styles_Users clientkeys)
        {
            var IssuedOn = DateTime.Now;
            var newToken = _IAuthenticate.GenerateToken(clientkeys, IssuedOn);
            TokensManager token = new TokensManager();
            token.TokenID = 0;
            token.TokenKey = newToken;
            token.CompanyID = 1;
            token.IssuedOn = IssuedOn;
            token.ExpiresOn = DateTime.Now.AddMinutes(Convert.ToInt32(ConfigurationManager.AppSettings["TokenExpiry"]));
            token.CreatedOn = DateTime.Now;
            var result = _IAuthenticate.InsertToken(token);

            if (result == 1)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
  HttpStatusCode.OK,
  new RegisterResponseModel() { status = true, data = new RegisterDataResponseModel() { FullName = clientkeys.FullName, UserID = clientkeys.ID_User.ToString(), Email = clientkeys.Email, AccessToken = newToken, Avatar = clientkeys.Image }, error_message = "" }
);
                return resp;
                //HttpResponseMessage response = new HttpResponseMessage();
                //response = Request.CreateResponse(HttpStatusCode.OK, "Authorized");
                //response.Headers.Add("Token", newToken);
                //response.Headers.Add("TokenExpiry", ConfigurationManager.AppSettings["TokenExpiry"]);
                //response.Headers.Add("Access-Control-Expose-Headers", "Token,TokenExpiry");
                //return response;
            }
            else
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
    HttpStatusCode.NotAcceptable,
    new RegisterResponseModel() { status = false, data = "", error_message = "" }
);
                return resp;
            }
        }





    }

    public class Styles_Users_Social
    {
        public string UserName { get; set; }
        public string Email { get; set; }
        public string FullName { get; set; }
        public string Type { get; set; }
    }

}
