using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Data.Entity.Infrastructure;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Text;
using System.Web.Http;
using System.Web.Http.Description;
using MusicAPIStore.Context;
using MusicAPIStore.Filters;
using MusicAPIStore.Models;
using StyleSoftware;

namespace MusicAPIStore.Controllers
{
    [APIAPPAuthorizeAttribute]
    public class Styles_UsersController : ApiController
    {
        private DatabaseContext db = new DatabaseContext();

        // GET: api/Styles_Users_Supplier
        [HttpGet]
        [Route("api/GetStyles_Users_Supplier/{top}")]
        public HttpResponseMessage GetStyles_Users_Supplier(int top)
        {
            try
            {
                //var list = db.Styles_Users.Where(e => e.IsStore == true & e.Active == true & e.Lock==false & e.ID_Role != 1 & e.Logo != null).OrderBy(x => Guid.NewGuid()).Take(top).ToList();
                var list =
                (from u in db.Styles_Users
                 where
                 u.IsStore == true &&
                 u.Active == true &&
                 u.Lock == false &&
                 u.ID_Role != 1 &&
                 u.Logo != null && (from p in db.Styles_Shops_Products
                                    where
                                    p.UserName == u.ID_User.ToString() &&
                                    p.Active == true &&
                                    p.IsInTrash == false
                                    select new { Image = "Thumb.ashx?s=400&file=/" + p.Image}).ToList().Count>1
                 select new
                 {
                     Users = new
                     {
                         Logo = "Thumb.ashx?s=400&file=/" + u.Logo,
                         UserName = u.UserName,
                         CompanyName = u.CompanyName,
                         ID_Role = u.ID_Role,
                         ID_User = u.ID_User,
                         StoreID = u.StoreID
                     },
                     Products = (from product in db.Styles_Shops_Products
                                 where
                                 product.UserName == u.ID_User.ToString() &&
                                 product.Active == true &&
                                 product.IsInTrash == false
                                 select new {
                                     Image = "Thumb.ashx?s=400&file=/" + product.Image,
                                 }).Take(2),
                  
                 }).OrderByDescending(u => u.Users.ID_Role).ThenBy(u => Guid.NewGuid()).Take(top).ToList();


                var resp = Request.CreateResponse<RegisterResponseModel>(
                   HttpStatusCode.OK,
                   new RegisterResponseModel()
                   {
                       status = true,
                       data = list,
                       error_message = ""
                   }
                   );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }

        //Thông tin gian hàng
        // GET: GetStyles_Users_InforStore/{idUser}
        [HttpGet]
        [Route("api/GetStyles_Users_InforStore/{idUser}")]
        public HttpResponseMessage GetStyles_Users_InforStore(int idUser)
        {
            try
            {
                var list = db.Styles_Users.Where(e => e.ID_User == idUser && e.IsStore == true).ToList();
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }

        //Lượt xem gian hàng
        [HttpGet]
        [Route("api/GetStyles_Users_TotalView/{idStore}")]
        public HttpResponseMessage GetStyles_Users_TotalView(int idStore)
        {
            try
            {
                var list =
                 (from u in db.Styles_Users
                  where u.ID_User == idStore &&
                     u.IsStore == true
                  select new
                  {
                      TotalView = u.TotalView
                  }).ToList();

                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }

        public class ModelStylesUsersAvgReply
        {
            public int AvgReplyTime { get; set; }
            public double resultAvgReplyTime { get; set; }
        }
        //Thời gian trả lời
        [HttpGet]
        [Route("api/GetStyles_Users_AvgReply/{idStore}")]
        public HttpResponseMessage GetStyles_Users_AvgReply(int idStore)
        {
            try
            {
                var list = db.Database.SqlQuery<ModelStylesUsersAvgReply>(@"
                select isNull(AVG(DATEDIFF(SECOND, AddTime,ReadTime)),0) 
                as AvgReplyTime 
                from Styles_Users_Messages 
                where ID_Sender in (Select ID_User 
                from (select d.ID_User,(Select count(ID) 
                from Styles_Users_Messages 
                where ID_Sender = " + idStore.ToString() + @"
                and ID_Receiver=d.ID_User) as CountMessage 
                from (select distinct ID_User 
                from (select ID_Sender as ID_User 
                from Styles_Users_Messages where ID_Receiver=" + idStore.ToString() + @") as t) as d) as a 
                where CountMessage>0) and ID_Receiver=" + idStore.ToString() + @"").ToList();

                foreach (ModelStylesUsersAvgReply d in list)
                {
                    d.resultAvgReplyTime = Convert.ToDouble(Math.Round(Convert.ToDouble(Convert.ToDouble(d.AvgReplyTime) / 60), 2));
                }

                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }

        //Tổng đăng sản phẩm - dịch vụ của gian hàng
        [HttpGet]
        [Route("api/GetStyles_Users_ProductCount/{idStore}")]
        public HttpResponseMessage GetStyles_Users_ProductCount(int idStore)
        {
            try
            {
                var list =
               (from p in db.Styles_Shops_Products
                where p.UserName == idStore.ToString() && p.IsInTrash == false && p.Active == true
                group p by p.UserName into playerGroup
                select new
                {
                    TotalProduct = playerGroup.Count(),
                }).ToList();

                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }
   
        //Tổng theo dõi gian hàng
        [HttpGet]
        [Route("api/GetStyles_Users_FollowCount/{idStore}")]
        public HttpResponseMessage GetStyles_Users_FollowCount(int idStore)
        {
            try
            {
                var list =
               (from p in db.Styles_Users_Follow
                where p.ID_User_Object == idStore 
                group p by p.ID_User_Object into playerGroup
                select new
                {
                    TotalFollow = playerGroup.Count(),
                }).ToList();



                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }

        public class ModelSearchStoreHint
        {
            
            public int ID_User { get; set; }
            public string Title { get; set; }
            public string UserName { get; set; }
            public string CompanyName { get; set; }
        }

        //Gợi ý tìm kiếm gian hàng
        [HttpGet]
        [Route("api/GetSearchStoreHint/{prefix}/{lang}")]
        public HttpResponseMessage GetSearchStoreHint(string prefix, string lang)
        {
            try
            {
                prefix = TiengViet.RemoveUnicode(TiengViet.BoDauKhongVietHoa(prefix), true).Replace("-", " ");
                if (lang == "vi")
                {
                    var list = db.Database.SqlQuery<ModelSearchStoreHint>("Select top(7) UserName,ID_User,CompanyName,(Select 'gian-hang') as Title from Styles_Users " +
          " where IsStore=1 and Active=1 and "
          + " ((UserName like N'%" + prefix + "%') or (CompanyName like N'%" + prefix + "%'))").ToList();
                    var resp = Request.CreateResponse<RegisterResponseModel>(
                  HttpStatusCode.OK,
                  new RegisterResponseModel()
                  {
                      status = true,
                      data = list,
                      error_message = ""
                  }
                  );
                    return resp;
                }
                else
                {
                    var list = db.Database.SqlQuery<ModelSearchStoreHint>("Select top(7) UserName,ID_User,CompanyName,(Select 'seller') as Title from Styles_Users " +
           " where IsStore=1 and Active=1 and "
           + " ((UserName like N'%" + prefix + "%') or (CompanyName like N'%" + prefix + "%'))").ToList();
                    var resp = Request.CreateResponse<RegisterResponseModel>(
                  HttpStatusCode.OK,
                  new RegisterResponseModel()
                  {
                      status = true,
                      data = list,
                      error_message = ""
                  }
                  );
                    return resp;
                }
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }


        public class ModelSearchPostHint
        {
            public int ID_Post { get; set; }
            public string Title { get; set; }
            public string Link_SEO { get; set; }
        }

        //Gợi ý tìm kiếm tin đăng
        [HttpGet]
        [Route("api/GetSearchPostHint/{prefix}/{lang}")]
        public HttpResponseMessage GetSearchPostHint(string prefix, string lang)
        {
            try
            {
                prefix = TiengViet.RemoveUnicode(TiengViet.BoDauKhongVietHoa(prefix), true).Replace("-", " ");
                var list = db.Database.SqlQuery<ModelSearchPostHint>("SELECT Top(7) Styles_Users_Posts_Translation.ID_Post, Title, Link_SEO from Styles_Users_Posts, Styles_Users_Posts_Translation where Styles_Users_Posts.ID_Post = Styles_Users_Posts_Translation.ID_Post and Styles_Users_Posts.Active = 1 and Styles_Users_Posts_Translation.LanguageCode = '" + lang + "' and "
                             + " (Title like N'%" + prefix + "%') Order by CONVERT(DateTime,AddTime,101) DESC").ToList();
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }


        public static bool IsUnicode(string input)
        {
            var asciiBytesCount = Encoding.ASCII.GetByteCount(input);
            var unicodBytesCount = Encoding.UTF8.GetByteCount(input);
            return asciiBytesCount != unicodBytesCount;
        }

        //Kết quả tìm kiếm gian hàng với từ khóa
        [HttpGet]
        [Route("api/GetSearchStore/{prefix}/{lang}/{top}")]
        public HttpResponseMessage GetSearchStore(string prefix, string lang, int top)
        {
            try
            {
                string strsearchmap = prefix;
                string patternSearch = "";

                if (IsUnicode(strsearchmap))
                {
                    patternSearch = strsearchmap.Replace("-", " ");
                }
                else
                {
                    patternSearch = TiengViet.RemoveUnicode(TiengViet.BoDauKhongVietHoa(strsearchmap), true).Replace("-", " ");
                }

                var list = db.Database.SqlQuery<Styles_Users_Search_By_Key>("SELECT top("+top+") Logo,UserName,FullName,Styles_Users.ID_User,TotalView,RegTime FROM Styles_Users,Styles_Users_Locations_Translation where Styles_Users.ID_Location = Styles_Users_Locations_Translation.ID_Location and IsStore = 1 and Styles_Users.Active = 1 and Styles_Users_Locations_Translation.LanguageCode='" + lang + "' and LocationName like N'%" + patternSearch + "%' order by ID_Role DESC").ToList();
                foreach (Styles_Users_Search_By_Key d in list)
                {
                    var ID_UserStore = d.ID_User;
                    d.ImageRole = (from user in db.Styles_Users
                                    join role in db.Styles_Users_Roles on user.ID_Role equals role.ID_Role
                                    join roleT in db.Styles_Users_Roles_Translation on role.ID_Role equals roleT.ID_Role
                                    where roleT.LanguageCode == lang  && user.ID_User == ID_UserStore select role).FirstOrDefault().Image.ToString();
                    d.RoleName = (from user in db.Styles_Users
                                   join role in db.Styles_Users_Roles on user.ID_Role equals role.ID_Role
                                   join roleT in db.Styles_Users_Roles_Translation on role.ID_Role equals roleT.ID_Role
                                   where roleT.LanguageCode == lang && user.ID_User == ID_UserStore
                                   select roleT).FirstOrDefault().RoleName.ToString();

                }
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }

        //Kết quả tìm kiếm gian hàng theo địa điểm với từ khóa
        [HttpGet]
        [Route("api/GetSearchStoreByLocation/{prefix}/{lang}/{top}")]
        public HttpResponseMessage GetSearchStoreByLocation(string prefix, string lang, int top)
        {
            try
            {
                string strsearchmap = prefix;
                string patternSearch = "";

                if (IsUnicode(strsearchmap))
                {
                    patternSearch = strsearchmap.Replace("-", " ");
                }
                else
                {
                    patternSearch = TiengViet.RemoveUnicode(TiengViet.BoDauKhongVietHoa(strsearchmap), true).Replace("-", " ");
                }
                var list = db.Database.SqlQuery<Styles_Users_Search_By_Key>("SELECT top ("+top+ ") Styles_Users .* FROM Styles_Users where IsStore = 1 and Active = 1 and  CompanyName like N'%" + patternSearch + "%' order by Styles_Users.ID_Role DESC").ToList();
                foreach (Styles_Users_Search_By_Key d in list)
                {
                    var ID_UserStore = d.ID_User;
                    d.ImageRole = (from user in db.Styles_Users
                                   join role in db.Styles_Users_Roles on user.ID_Role equals role.ID_Role
                                   join roleT in db.Styles_Users_Roles_Translation on role.ID_Role equals roleT.ID_Role
                                   where roleT.LanguageCode == lang && user.ID_User == ID_UserStore
                                   select role).FirstOrDefault().Image.ToString();
                    d.RoleName = (from user in db.Styles_Users
                                  join role in db.Styles_Users_Roles on user.ID_Role equals role.ID_Role
                                  join roleT in db.Styles_Users_Roles_Translation on role.ID_Role equals roleT.ID_Role
                                  where roleT.LanguageCode == lang && user.ID_User == ID_UserStore
                                  select roleT).FirstOrDefault().RoleName.ToString();

                }
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }

        //Download hồ sơ năng lực
        [HttpGet]
        [Route("api/GetStyles_Users_FileCapacityProfile/{idStore}")]
        public HttpResponseMessage GetStyles_Users_FileCapacityProfile(int idStore)
        {
            try
            {
            var list =
           (from certificate in db.Styles_Users_Certificates
            where
            certificate.Active == true &&
            certificate.ID_User == idStore
            select new
            {
                FileCapacityProfile = (from u in db.Styles_Users
                                       where u.ID_User == idStore
                            select u.FileCapacityProfile),
                Certificate = certificate
            }).ToList();

               

                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }

        //Download Catalog
        [HttpGet]
        [Route("api/GetStyles_Users_Catalog/{idStore}")]
        public HttpResponseMessage GetStyles_Users_Catalog(int idStore)
        {
            try
            {
                var list =
               (from u in db.Styles_Users
                where u.ID_User == idStore
                select new
                {
                    FileCatalog = u.FileCatalog
                }).ToList();
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }

    }

    public class Styles_Users_Search_By_Key 
    {
        public string ImageRole { get; set; }
        public string RoleName { get; set; }
        public Styles_Users_Search_By_Key()
        {
            this.Styles_Users_Translation = new HashSet<Styles_Users_Translation>();
        }

        public int ID_User { get; set; }
        public string UserName { get; set; }
        public string Password { get; set; }
        public string FullName { get; set; }
        public string NickName { get; set; }
        public string Image { get; set; }
        public System.DateTime Birthday { get; set; }
        public bool Gender { get; set; }
        public string Email { get; set; }
        public string AlterEmail { get; set; }
        public string Telephone { get; set; }
        public string Address { get; set; }
        public System.DateTime RegTime { get; set; }
        public Nullable<bool> Active { get; set; }
        public Nullable<bool> Lock { get; set; }
        public string LanguageCode { get; set; }
        public string Yahoo { get; set; }
        public string Skype { get; set; }
        public string FaceBook { get; set; }
        public System.DateTime LastLogin { get; set; }
        public string Last_IP { get; set; }
        public string CMND { get; set; }
        public string PassPort { get; set; }
        public Nullable<int> ID_Role { get; set; }
        public string Logo { get; set; }
        public Nullable<bool> IsStore { get; set; }
        public string StoreID { get; set; }
        public Nullable<double> Latitude { get; set; }
        public Nullable<double> Longitude { get; set; }
        public string ListProductViewed { get; set; }
        public string SearchHistory { get; set; }
        public Nullable<double> RatingAverage { get; set; }
        public string ShopConfig { get; set; }
        public Nullable<bool> IsCompany { get; set; }
        public string CompanyName { get; set; }
        public string CompanyNumber { get; set; }
        public string TaxNumber { get; set; }
        public Nullable<System.DateTime> IDDate { get; set; }
        public Nullable<int> TotalView { get; set; }
        public Nullable<int> IDPlace { get; set; }
        public Nullable<int> Point { get; set; }
        public Nullable<int> PointB { get; set; }
        public Nullable<System.DateTime> StartTime { get; set; }
        public Nullable<System.DateTime> ExpTime { get; set; }
        public string FileCapacityProfile { get; set; }
        public string FileCatalog { get; set; }
        public Nullable<double> TotalRevenue { get; set; }
        public string CellPhone { get; set; }
        public string Website { get; set; }
        public string Zalo { get; set; }
        public string WhatApps { get; set; }
        public Nullable<int> ID_Location { get; set; }
        public string BuySellBoth { get; set; }
        public Nullable<int> ID_BusinessType { get; set; }
        public Nullable<int> NumberOfMember { get; set; }
        public Nullable<int> NumberOfEmployee { get; set; }
        public Nullable<int> YearEstablished { get; set; }
        public string ExportMarkets { get; set; }
        public Nullable<double> ResponseRate { get; set; }
        public Nullable<double> ResponseTime { get; set; }
        public string UserCode { get; set; }
        public string CompanyRepresentative { get; set; }
        public string RegisteredAddress { get; set; }
        public string AddressSalesOffice { get; set; }
        public string FactoryAddress { get; set; }
        public string LogoStore { get; set; }
        public string MainProduct { get; set; }
        public Nullable<int> ID_Business_Enterprise { get; set; }
        public Nullable<int> ID_Status { get; set; }
        public Nullable<int> ID_Source { get; set; }
        public string BusinessCapital { get; set; }
        public string ManageCertificate { get; set; }
        public string AdminUser { get; set; }
        public Nullable<int> StoreType { get; set; }
        public string Theme { get; set; }
        public Nullable<int> Level { get; set; }
        public Nullable<int> ID_Theme { get; set; }
        public string LogoBuyer { get; set; }
        public string BannerImage { get; set; }
        public string AboutStore { get; set; }
        public string LogoPending { get; set; }
        public Nullable<bool> LockPending { get; set; }
        public Nullable<int> ID_Type { get; set; }
        public Nullable<bool> IsRegisterTeam { get; set; }
        public Nullable<bool> IsOnline { get; set; }
        public Nullable<int> NumberPeopleTeam { get; set; }
        public Nullable<bool> Hidden { get; set; }

        public virtual ICollection<Styles_Users_Translation> Styles_Users_Translation { get; set; }
    }
}