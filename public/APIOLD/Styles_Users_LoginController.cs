using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Data.Entity.Infrastructure;
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
    public class Styles_Users_LoginController : ApiController
    {
        private DatabaseContext db = new DatabaseContext();

        // GET: api/GetStyles_User_Follow/{iduserfllow}
        [HttpGet]
        [Route("api/GetStyles_User_Follow2/{iduserfllow}")]
        public HttpResponseMessage GetStyles_User_Follow2(int iduserfllow)
        {
            try
            {
                var list =
                    (from u in db.Styles_Users
                     join f in db.Styles_Users_Follow on u.ID_User equals f.ID_User_Object
                     where f.ID_User_Follow == iduserfllow &&
                        u.IsStore == true &&
                 u.Active == true &&
                 u.Lock == false &&
                 //u.ID_Role != 1 &&
                 u.Logo != null 
                     select new
                    {
                         UserName = u.CompanyName,
                         Logo = u.Logo,
                         ID_Role = u.ID_Role,
                         Products = (from product in db.Styles_Shops_Products
                                     where
                                     product.UserName == u.ID_User.ToString() &&
                                     product.Active == true &&
                                     product.IsInTrash == false
                                     select product.Image).Take(2).ToList()
                       
                    }).OrderBy(u => u.ID_Role).ToList();

                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    });
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

        [HttpGet]
        [Route("api/GetStyles_User_Follow/{iduserfllow}")]
        public HttpResponseMessage GetStyles_User_Follow(int iduserfllow)
        {
            try
            {
                var list =
                    (from u in db.Styles_Users
                     join f in db.Styles_Users_Follow on u.ID_User equals f.ID_User_Object
                     where f.ID_User_Follow == iduserfllow &&
                        u.IsStore == true &&
                 u.Active == true &&
                 u.Lock == false &&
                 //u.ID_Role != 1 &&
                 u.Logo != null
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
                                     }).Take(2).ToList()

                     }).OrderBy(u => u.Users.ID_Role).ToList();

                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    });
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
        // GET: GetStyles_Users_Infor_Store/{idUser}
        [HttpGet]
        [Route("api/GetStyles_Users_Infor_Store/{idUser}")]
        public HttpResponseMessage GetStyles_Users_Infor_Store(int idUser)
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

        //Lấy lịch sử tìm kiếm của người dùng
        // GET: /api/GetStyles_Users_History_Search/{idUser}
        [HttpGet]
        [Route("api/GetStyles_Users_History_Search/{idUser}")]
        public HttpResponseMessage GetStyles_Users_History_Search(int idUser)
        {
            try
            {
                var list =
                     (from u in db.Styles_Users
                      where u.ID_User == idUser
                      select new
                      {
                          SearchHistory = u.SearchHistory
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

        //Post: /api/PostStyles_Users_History_Search/{idUser}/{prefix}
        [HttpPost]
        [Route("api/PostStyles_Users_History_Search/{idUser}/{prefix}")]
        public HttpResponseMessage PostStyles_Users_History_Search(int idUser, string prefix)
        {
            try
            {
                Styles_Users updateUser = db.Styles_Users.Find(idUser);
                if (updateUser.SearchHistory == "")
                {
                    updateUser.SearchHistory = prefix;
                }
                else
                {
                    updateUser.SearchHistory = updateUser.SearchHistory += "|||" + prefix;
                }
                
                db.Entry(updateUser).State=EntityState.Modified;
                db.SaveChanges();

                var resp = Request.CreateResponse<RegisterResponseModel>(
              HttpStatusCode.OK,
              new RegisterResponseModel()
              {
                  status = true,
                  data = "",
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

        //Theo dõi gian hàng
        [HttpPost]
        [Route("api/PostStyles_AddFollow/{idUser}/{idFollow}")]
        public HttpResponseMessage PostStyles_AddFollow(int idUser, int idFollow)
        {
            try
            {
                Styles_Users_Follow insertUsers_Follow = new Styles_Users_Follow();
                insertUsers_Follow.ID_User_Object = idFollow;
                insertUsers_Follow.ID_User_Follow = idUser;
                insertUsers_Follow.Hidden = false;
                insertUsers_Follow.FollowTime = DateTime.Now;
                db.Styles_Users_Follow.Add(insertUsers_Follow);
                db.SaveChanges();
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = "",
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

        //Hủy theo dõi gian hàng
        [HttpPost]
        [Route("api/PostStyles_RemoveFollow/{idUser}/{idFollow}")]
        public HttpResponseMessage PostStyles_RemoveFollow(int idUser, int idFollow)
        {
            try
            {
                int ID = (from f in db.Styles_Users_Follow
                          where f.ID_User_Object == idFollow && f.ID_User_Follow == idUser
                          select f.ID).ToList().FirstOrDefault(); 
                Styles_Users_Follow removeUsers_Follow = db.Styles_Users_Follow.Find(ID);

                if (removeUsers_Follow != null)
                {
                    db.Styles_Users_Follow.Remove(removeUsers_Follow);
                }
                db.SaveChanges();

                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = "",
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
}