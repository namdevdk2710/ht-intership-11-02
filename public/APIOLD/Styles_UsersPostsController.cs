using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Data.Entity.Infrastructure;
using System.Globalization;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;
using System.Web.Http.Description;
using MusicAPIStore.Context;
using MusicAPIStore.Filters;
using MusicAPIStore.Models;

namespace MusicAPIStore.Controllers
{
    [APIAuthorizeAttribute]
    public class Styles_UsersPostsController : ApiController
    {
        private DatabaseContext db = new DatabaseContext();

        // GET: api/Styles_Users_Post_Types
        [HttpGet]
        [Route("api/GetStyles_Users_Post_Types")]
        public HttpResponseMessage GetStyles_Users_Post_Types()
        {
            try
            {
                var list = db.Styles_Users_Post_Types.ToList();
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

        // GET: api/GetStyles_Users_Post_Types
        [HttpGet]
        [Route("api/GetStyles_Users_Post_Types/{idType}/{lang}")]
        public HttpResponseMessage GetStyles_Users_Post_Types(int idType, string lang)
        {
            try
            {
                //var list = db.Styles_Users_Posts.Where(e => e.ID_Type == idType & e.Active == true).OrderByDescending(e => e.AddTimeRefresh).ToList();
                var list = db.Database.SqlQuery<UsersPost>(@"SELECT Link_SEO,Styles_Users_Posts.ID_User,TotalView,CompanyName,Phone,Address,Styles_Users_Posts.ID_Post,OpeningTime,ClosingTime,Title,AddTime,EditTime,
                AddTimeRefresh,Image,(Select FullName from Styles_Users where Styles_Users.ID_User=Styles_Users_Posts.ID_User) as FullName ,
                (Select Image from Styles_Users_Locations where Styles_Users_Locations.LocationParent=0 and 
                (Styles_Users_Locations.ID_Location=Styles_Users_Posts.ID_Location or Styles_Users_Locations.ListChild like ('%|' + cast(Styles_Users_Posts.ID_Location as varchar(5)) +'|%') ) ) as ImageFlag 
                FROM Styles_Users_Posts,Styles_Users_Posts_Translation 
                where Styles_Users_Posts.ID_Post = Styles_Users_Posts_Translation.ID_Post 
                and Styles_Users_Posts.ID_Type = " + idType + @" and Styles_Users_Posts.Active = 1 
                and Styles_Users_Posts_Translation.LanguageCode='" + lang + @"'
                order by AddTimeRefresh DESC").ToList();

                foreach (UsersPost d in list)
                {
                    if (d.Image != "")
                    {
                        d.Image = "Thumb.ashx?s=70&file=/" + d.Image;
                    }
                    else
                    {
                        Styles_Users user = db.Styles_Users.Find(d.ID_User);
                        Styles_Users_Roles userRole = db.Styles_Users_Roles.Find(user.ID_Role);
                        if (user.ID_Role == 0)
                        {
                            d.Image = "../../../Thumb.ashx?s=70&file=/UploadImages/tradeline/_img_post.jpg";
                        }
                        else
                        {
                            d.Image = "Thumb.ashx?s=70&file=/" + userRole.Image;
                        }

                    }
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

        // GET: api/GetStyles_Users_Post_Types
        [HttpGet]
        [Route("api/GetStyles_Users_Post_By_Location_DateRange/{idType}/{idLocation}/{fromDate}/{toDate}/{lang}")]
        public HttpResponseMessage GetStyles_Users_Post_By_Location_DateRange(int idType, int idLocation, string fromDate, string toDate, string lang)
        {
            try
            {
                string strWhere = "";
                // DateTime FromDate = Convert.ToDateTime(fromDate.ToString(),);
                DateTime FromDate = DateTime.Parse(fromDate.ToString(), new CultureInfo("vi-VN").DateTimeFormat);
                DateTime ToDate = DateTime.Parse(toDate.ToString(), new CultureInfo("vi-VN").DateTimeFormat);
                //  DateTime ToDate = Convert.ToDateTime(toDate.ToString());

                if (idLocation == 0)
                {
                    strWhere = " and Styles_Users_Posts.ID_Type = " + idType;

                }
                else
                {
                    var ListChildCustom = from c in db.Styles_Users_Locations
                                          where c.ID_Location == idLocation
                                          select c;
                    string ListChild = ListChildCustom.ToList().FirstOrDefault().ListChild.ToString().Replace("|", ",");
                    if (ListChild == "")
                    {
                        ListChild = idLocation.ToString();
                    }
                    strWhere = " and Styles_Users_Posts.ID_Type = '" + idType + "' and ID_Location in (" + ListChild + ") ";
                }
                string sql = @"SELECT Link_SEO,TotalView,Styles_Users_Posts.ID_User,CompanyName,Phone,Address,Styles_Users_Posts.ID_Post,OpeningTime,ClosingTime,Title,AddTime,EditTime,
                AddTimeRefresh,Image,(Select FullName from Styles_Users where Styles_Users.ID_User=Styles_Users_Posts.ID_User) as FullName ,
                (Select Image from Styles_Users_Locations where Styles_Users_Locations.LocationParent=0 and 
                ( Styles_Users_Locations.ID_Location=Styles_Users_Posts.ID_Location or Styles_Users_Locations.ListChild like ('%|' + cast(Styles_Users_Posts.ID_Location as varchar(5)) +'|%') ) ) as ImageFlag 
                FROM Styles_Users_Posts,Styles_Users_Posts_Translation 
                where Styles_Users_Posts.Active = 1 and 
                Styles_Users_Posts.ID_Post = Styles_Users_Posts_Translation.ID_Post 
                and Styles_Users_Posts_Translation.LanguageCode='" + lang + @"' 
                and Styles_Users_Posts.AddTimeRefresh >= '" + FromDate.ToString("yyyy-MM-dd HH:mm:ss") + @"' 
                and Styles_Users_Posts.AddTimeRefresh <= '" + ToDate.ToString("yyyy-MM-dd HH:mm:ss") + "'" + strWhere + "  Order by AddTimeRefresh DESC ";
                var list = db.Database.SqlQuery<UsersPost>(sql).ToList();
                foreach (UsersPost d in list)
                {
                    if (d.Image != "")
                    {
                        d.Image = "Thumb.ashx?s=70&file=/" + d.Image;
                    }
                    else
                    {
                        Styles_Users user = db.Styles_Users.Find(d.ID_User);
                        Styles_Users_Roles userRole = db.Styles_Users_Roles.Find(user.ID_Role);
                        if (user.ID_Role == 0)
                        {
                            d.Image = "../../../Thumb.ashx?s=70&file=/UploadImages/tradeline/_img_post.jpg";
                        }
                        else
                        {
                            d.Image = "Thumb.ashx?s=70&file=/" + userRole.Image;
                        }

                    }
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

        // GET: api/GetStyles_Users_Post_Types/Detail/{idPost}
        [HttpGet]
        [Route("api/GetStyles_Users_Posts/Detail/{idPost}")]
        public HttpResponseMessage GetStyles_Users_Posts(int idPost)
        {
            try
            {
                var list =
                (
                    from postImage in db.Styles_Users_Posts_Images
                    join post in db.Styles_Users_Posts
                    on postImage.ID_Post equals post.ID_Post

                    where post.ID_Post == idPost
                    select new
                    {
                        Post = post,
                        PostImage = postImage,

                    }
                ).ToList();
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

        // GET: api/GetStyles_Users_Locations
        [HttpGet]
        [Route("api/GetStyles_Users_Locations")]
        public HttpResponseMessage GetStyles_Users_Locations()
        {
            try
            {
                var list = db.Styles_Users_Locations.Where(d => d.LocationParent == 0).ToList();
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
    public class UsersPost
    {

        public string Link_SEO { get; set; }
        public string CompanyName { get; set; }
        public int TotalView { get; set; }
        public int ID_User { get; set; }


        public string Phone { get; set; }
        public string Address { get; set; }

        public int ID_Post { get; set; }
        public Nullable<System.DateTime> OpeningTime { get; set; }
        public Nullable<System.DateTime> ClosingTime { get; set; }
        public string Title { get; set; }
        public Nullable<System.DateTime> AddTime { get; set; }
        public Nullable<System.DateTime> EditTime { get; set; }
        //public Nullable<System.DateTime> AddTimeRefresh { get; set; }
        public Nullable<System.DateTime> AddTimeRefresh { get; set; }
        public string Image { get; set; }
        public string FullName { get; set; }
        public string ImageFlag { get; set; }

    }
}